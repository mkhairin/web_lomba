<?php

namespace App\Models;

use CodeIgniter\Model;

class LombaModel extends Model
{
    protected $table = 'lomba';
    protected $primaryKey = 'id_lomba';
    protected $allowedFields = [
        'nama',
        'deskripsi',
        'link_peraturan',
        'link_pendaftaran',
        'tgl_dibuka',
        'tgl_ditutup',
        'status',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('lomba');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getdataSingle()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('lomba');
        $query = $builder->limit(1)->get();
        return $query->getResult();
    }


    public function insertData($data)
    {
        $db     = \Config\Database::connect();
        $builder   = $db->table('lomba');
        $builder->insert($data);
    }

    public function updateData($id, $data)
    {
        $this->update($id, $data);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('lomba');
        $builder->where('id_lomba', $id);
        $builder->delete();
    }

    public function getDataWhere($kategori = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('lomba');
        
        if ($kategori !== null) {
            $builder->where('nama', $kategori);
        }
    
        $query = $builder->get();
        return $query->getResult();
    }
    
}
