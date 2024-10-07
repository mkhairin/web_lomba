<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumpulanModel extends Model
{
    protected $table = 'pengumpulan';
    protected $primaryKey = 'id_pengumpulan';
    protected $allowedFields = [
        'id_lomba',
        'link_pengumpulan',
        'deadline',
        'status'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pengumpulan');
        $builder->select('pengumpulan.*, lomba.nama');
        $builder->join('lomba', 'lomba.id_lomba = pengumpulan.id_lomba', 'left');

        $query = $builder->get();
        return $query->getResult();
    }
}
