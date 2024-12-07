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

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sponsor');
        $builder->orderBy('created_at', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

}
