<?php

namespace App\Models;

use CodeIgniter\Model;

class NasabahModel extends Model
{
    protected $table            = 'nasabah';
    protected $primaryKey       = 'nasabah_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nasabah_id',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_tgl_lahir',
        'agama',
        'alamat_lengkap',
        'nomor_telepon',
        'nomor_rekening',
        'saldo',
        'email',
        'username',
        'password',
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    public function getData($parameter)
    {
        $builder = $this->table($this->table);
        $builder->where('username=', $parameter);
        $builder->orWhere('email=', $parameter);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function updateData($data)
    {
        $builder = $this->table($this->table);
        if($builder->save($data)){
            return true;
        } else {
            return false;
        }
    }

    public function getNasabahById($id)
    {
        return $this->find($id);
    }

    public function getDataRekening()
    {
        return $this->select('nasabah_id, nama_lengkap, nomor_rekening')->findAll();
    }
}
