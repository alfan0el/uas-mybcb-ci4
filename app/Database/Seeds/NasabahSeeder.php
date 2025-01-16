<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NasabahSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_lengkap' => 'Metta Suryani',
            'jenis_kelamin' => 'Perempuan',
            'tempat_tgl_lahir' => 'Bekasi, 4 Februari 1998',
            'agama' => 'Buddha',
            'alamat_lengkap' => 'Jl. Raya Ps. Kecapi No.24',
            'nomor_telepon' => '081290507545',
            'nomor_rekening' => '6871812902',
            'saldo' => 100000000,
            'email' => 'mettasryni@gmail.com',
            'username' => 'metta4',
            'password' => password_hash('metta4', PASSWORD_DEFAULT)
        ];

        $this->db->table('nasabah')->insert($data);
    }
}
