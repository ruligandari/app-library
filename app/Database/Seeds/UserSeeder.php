<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'Riki Widiantoro',
            'jabatan' => 'Staff IT',
            'email'    => 'rikiwidiantoro@gmail.com',
            'password' => password_hash('riki123', PASSWORD_DEFAULT),
        ];

        // insert
        $this->db->table('user')->insert($data);
    }
}
