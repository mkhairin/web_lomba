<?php

namespace App\Models;
use CodeIgniter\Model;

class LombaModel extends Model {
    protected $table = 'lomba';
    protected $primaryKey = 'id_lomba';
    protected $allowedFields = [
        'nama',
        'deskripsi',
        'peraturan',
        'link_peraturan',
        'tgl_dibuka',
        'tgl_ditutup',
        'status'
    ];

    public function getDataLomba()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('lomba');
        $query = $builder->get();
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
}