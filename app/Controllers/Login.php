<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin;
use App\Models\User;

class Login extends BaseController
{
    public function index()
    {
        return view('login/login');
    }

    public function auth()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getVar('password');

        $adminModel = new Admin();
        $admin = $adminModel->where('email', $email)->first();

        $userModel = new User();
        $user = $userModel->where('email', $email)->first();

        // melakukan cek apakah user atau admin
        if ($admin) {
            // jika admin
            if (password_verify($password, $admin['password'])) {
                // jika password benar
                $data = [
                    'id' => $admin['id'],
                    'nama' => $admin['nama'],
                    'email' => $admin['email'],
                    'jabatan' => 'Admin',
                    'role' => $admin['role'],
                    'logged_in' => TRUE
                ];
                session()->set($data);
                return redirect()->to(base_url('dashboard'));
            } else {
                // jika password salah
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to(base_url('/'));
            }
        } else if ($user) {
            // jika user
            if (password_verify($password, $user['password'])) {
                // jika password benar
                $data = [
                    'id' => $user['id'],
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'jabatan' => $user['jabatan'],
                    'role' => '0',
                    'logged_in' => TRUE
                ];
                session()->set($data);
                return redirect()->to(base_url('dashboard'));
            } else {
                // jika password salah
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to(base_url('/'));
            }
        } else {
            // jika tidak ada
            session()->setFlashdata('error', 'Email Tidak Terdaftar');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
