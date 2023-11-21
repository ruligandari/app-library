<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
        ];
        // insert
        $this->db->table('admin')->insert($data);
    }
}
