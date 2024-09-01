<?php

namespace App\Models;

use CodeIgniter\Model;

class JuaraModel extends Model
{
    protected $table = 'juara';
    protected $primaryKey = 'id_juara';
    protected $allowedFields = [
        'juara',
        'total_hadiah',
    ];

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('juara');
        $query = $builder->get();
        return $query->getResult();
    }

    public function insertData($data)
    {
        $db     =   \Config\Database::connect();
        $builder = $db->table('juara');
        $builder->insert($data);
    }

    public function updateData($id, $data)
    {
        $this->update($id, $data);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('juara');
        $builder->where('id_juara', $id);
        $builder->delete();
    }
}
