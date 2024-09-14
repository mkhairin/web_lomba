<?php

namespace App\Models;
use CodeIgniter\Model;

class AdminModel extends Model {
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = [
        'username',
        'password',
        'roles',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('admin');
        $query = $builder->get();
        return $query->getResult();

    }
}