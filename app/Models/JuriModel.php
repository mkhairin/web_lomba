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
        'id_lomba'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getdata($username = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('juri');
        $builder->select('juri.*, lomba.nama');
        $builder->join('lomba', 'lomba.id_lomba = juri.id_lomba', 'left');
        
        if ($username) {
            $builder->where('juri.username', $username);
        }
    
        $query = $builder->get();
        return $query->getResult();
    }
    
    
}