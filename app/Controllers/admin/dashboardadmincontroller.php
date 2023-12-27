<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\FileModel;
use App\Models\User;
use DateTime;

class dashboardadmincontroller extends BaseController
{
    public function index()
    {
        $datafile = new FileModel();
        $userModel = new User();
        $cekSession = session()->get('role');
        if ($cekSession == '1' || $cekSession == '2') {

            $dataslip = $datafile->getDataByuser();
        } else {
            $id = session()->get('id');
            $dataslip = $datafile->getDataByIduser($id);
        }

        $data = [
            'title' => 'Slip Gaji',
            'datafile' => $dataslip,
            'user' => $userModel->findAll()
        ];
        return view('admin/dashboardadmin', $data);
    }
    public function upload()
    {
        $datafile = new FileModel();
        $tanggal = $this->request->getVar('tanggal');
        $file = $this->request->getFile('file');
        $file->move('file');
        $nama_file = $file->getName();
        $datafile->insert([
            'tanggal' => $tanggal,
            'nama_file' => $nama_file,
            'id_user' => $this->request->getVar('id_karyawan'),
        ]);

        session()->setFlashdata('success', 'Data Berhasil Diupload');
        return redirect()->to(base_url('slip-gaji'));
    }
    public function update()
    {
        $datafile = new FileModel();
        $id = $this->request->getVar('id');
        $tanggal = $this->request->getVar('tanggal');
        $file = $this->request->getFile('file');
        $oldFile = $this->request->getVar('old_file');
        if ($file == '') {
            $nama_file = $oldFile;
        } else {
            $nama_file = $file->getRandomName();
            $file->move('file', $nama_file);
        }
        $data = [
            'tanggal' => $tanggal,
            'nama_file' => $nama_file,
            'id_user' => $this->request->getVar('id_karyawan'),
        ];
        $datafile->update($id, $data);

        session()->setFlashdata('success', 'Data Berhasil Diupload');
        return redirect()->to(base_url('slip-gaji'));
    }
    public function delete()
    {
        $id = $this->request->getPost('id');
        $datafile = new FileModel();
        $namafile = $datafile->find($id);
        unlink('file/' . $namafile['nama_file']);
        $isdelete = $datafile->delete($id);

        if ($isdelete) {
            $data = [
                'success' => true,
            ];
        } else {
            $data = [
                'success' => false,
            ];
        }
        echo json_encode($data);
    }
}
