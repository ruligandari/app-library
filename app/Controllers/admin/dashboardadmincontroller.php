<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\FileModel;
use DateTime;

class dashboardadmincontroller extends BaseController
{
    public function index()
    {
        $datafile = new FileModel();
        $data = [
            'datafile' => $datafile->findAll()
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
            'nama_file' => $nama_file
        ]);

        session()->setFlashdata('success', 'Data Berhasil Diupload');
        return redirect()->to(base_url('dashboard'));
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
