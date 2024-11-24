<?php

namespace App\Models;

use CodeIgniter\Model;

class FaQModel extends Model
{
    protected $table            = 'faquestions';
    protected $primaryKey       = 'id_faq';
    protected $allowedFields = [
        'questions',
        'answers'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('faquestions');
        $query = $builder->get();
        return $query->getResult();
    }
}
