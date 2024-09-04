<?php

namespace App\Models;

use CodeIgniter\Model;

class SponsorModel extends Model
{
    protected $table = 'sponsor';
    protected $primaryKey = 'id_sponsor';
    protected $allowedFields = [
        'nama_sponsor',
        'logo',
    ];

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sponsor');
        $query = $builder->get();
        return $query->getResult();
    }

    public function insertData($data)
    {
        $db     =   \Config\Database::connect();
        $builder = $db->table('sponsor');
        $builder->insert($data);
    }

    public function updateData($id, $data)
    {
        $this->update($id, $data);
    }

    public function deleteData($id) 
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sponsor');
        $builder->where('id_sponsor', $id);
        $builder->delete();
    }
}

