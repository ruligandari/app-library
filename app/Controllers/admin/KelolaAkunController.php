<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class KelolaAkunController extends BaseController
{
    public function index()
    {
        $adminModel = new \App\Models\Admin();
        $karyawanModel = new \App\Models\User();
        $dataAdmin = $adminModel->findAll();
        $dataKaryawan = $karyawanModel->orderBy('id', 'DESC')->findAll();
        $data = [
            'title' => 'Kelola Akun',
            'dataAdmin' => $dataAdmin,
            'dataKaryawan' => $dataKaryawan,
        ];

        return view('admin/kelola-akun', $data);
    }

    public function store()
    {
        $adminModel = new \App\Models\Admin();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('hak_akses'),
        ];

        $adminModel->insert($data);

        return redirect()->to(base_url('kelola-akun'));
    }
    public function storeKaryawan()
    {
        $karyawanModel = new \App\Models\User();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'email' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        $karyawanModel->insert($data);

        return redirect()->to(base_url('kelola-akun'))->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function update()
    {
        $adminModel = new \App\Models\Admin();
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('username');
        $password = $this->request->getVar('password');
        $role = $this->request->getPost('hak_akses');
        $oldPassword = $this->request->getPost('old_password');

        if ($password == null) {
            $password = $oldPassword;
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
        }
        $data = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'role' => $role,
        ];

        $adminModel->update($id, $data);

        return redirect()->to(base_url('kelola-akun'))->with('success', 'Data berhasil diubah');
    }
    public function updateKaryawan()
    {
        $adminModel = new \App\Models\User();
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('username');
        $jabatan = $this->request->getPost('jabatan');
        $password = $this->request->getVar('password');
        $oldPassword = $this->request->getPost('old_password');

        if ($password == null) {
            $password = $oldPassword;
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
        }
        $data = [
            'nama' => $nama,
            'email' => $email,
            'jabatan' => $jabatan,
            'password' => $password,
        ];

        $adminModel->update($id, $data);

        return redirect()->to(base_url('kelola-akun'))->with('success', 'Data berhasil diubah');
    }

    public function delete()
    {
        $adminModel = new \App\Models\Admin();

        $id = $this->request->getPost('id');
        $isdelete = $adminModel->delete($id);

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
    public function deleteKaryawan()
    {
        $adminModel = new \App\Models\User();
        $gajiModel = new \App\Models\FileModel();
        $id = $this->request->getPost('id');
        $isdelete = $adminModel->delete($id);
        $gajiModel->where('id_user', $id)->delete();


        if ($isdelete && $gajiModel) {
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
