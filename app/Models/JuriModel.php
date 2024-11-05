<?php

namespace App\Models;
use CodeIgniter\Model;

class JuriModel extends Model {
    protected $table = 'juri';
    protected $primaryKey = 'id_juri';
    protected $allowedFields = [
        'username',
        'password',
        'role',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('juri');
        $query = $builder->get();
        return $query->getResult();
    }
}