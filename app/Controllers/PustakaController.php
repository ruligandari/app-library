<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PustakaController extends BaseController
{
    public function index()
    {
        $dataPustakaModel = new \App\Models\DataPustakaModel();
        $pustaka = $dataPustakaModel->findAll();
        $data = [
            'title' => 'Pustaka',
            'datafile' => $pustaka,
        ];
        return view('admin/pustaka', $data);
    }

    public function upload()
    {
        $dataPustakaModel = new \App\Models\DataPustakaModel();
        $file = $this->request->getFile('file');
        $tanggal = $this->request->getPost('tanggal');
        $nama_file = $file->getName();
        $data = [
            'tanggal' => $tanggal,
            'nama_file' => $nama_file,
        ];
        $dataPustakaModel->insert($data);
        $file->move('file_pustaka');
        return redirect()->to('/pustaka');
    }
    public function update()
    {
        $dataPustakaModel = new \App\Models\DataPustakaModel();
        $id = $this->request->getPost('id');
        $oldFile = $this->request->getPost('old_file');
        $file = $this->request->getFile('file');
        $tanggal = $this->request->getPost('tanggal');
        $nama_file = $file->getName();

        if ($file == '') {
            $nama_file = $oldFile;
        } else {
            $nama_file = $file->getName();
            $file->move('file_pustaka', $nama_file);
        }
        $data = [
            'tanggal' => $tanggal,
            'nama_file' => $nama_file,
        ];
        $dataPustakaModel->update($id, $data);
        return redirect()->to('/pustaka')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $dataPustakaModel = new \App\Models\DataPustakaModel();
        $namafile = $dataPustakaModel->find($id);
        unlink('file_pustaka/' . $namafile['nama_file']);
        $isdelete = $dataPustakaModel->delete($id);

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
