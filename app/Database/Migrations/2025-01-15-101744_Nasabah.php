<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;
use Faker\Generator as FakerGenerator;
use Mockery\Generator;

class Nasabah extends Migration
{
    protected $forge;
    public function __construct()
    {
        $this->forge = \Config\Database::forge();

    }

    public function up()
    {
        $this->forge->addField([
            'nasabah_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'nama_lengkap' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
                'unique'        => true
            ],
            'jenis_kelamin' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'tempat_tgl_lahir' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'agama' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'alamat_lengkap' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'nomor_telepon' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
                'unique'        => true
            ],
            'nomor_rekening' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
                'unique'        => true,
                'null'          => false,
            ],
            'saldo' => [
                'type'          => 'DECIMAL',
                'constraint'    => 15,
                'default'       => 0
            ],
            'email' => [
                'type'          => 'VARCHAR',
                'constraint'    => 50,
                'unique'        => true
            ],
            'username' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
                'unique'        => true
            ],
            'password' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'deleted_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
                'null'    => true,
            ],
        ]);
        $this->forge->addKey('nasabah_id', true);
        $this->forge->createTable('nasabah');
    }

    public function down()
    {
        $this->forge->dropTable('nasabah');
    }
}
