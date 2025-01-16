<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => 'admin',
                'email'    => 'admin@tes.com',
                'bagian'   => 'admin',
                'area'     => NULL,
            ],
            [
                'username' => 'user',
                'password' => 'user',
                'email'    => 'user@tes.com',
                'bagian'   => 'user',
                'area'     => 'KK1A',
            ],
        ];

        // Using Query Builder
        $this->db->table('user')->insertBatch($data);
    }
}
