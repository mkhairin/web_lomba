<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table = 'soal';
    protected $primaryKey = 'id_soal';
    protected $allowedFields = [
        'id_lomba',
        'link_soal',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('soal');
        $builder->select('soal.*, lomba.nama');
        $builder->join('lomba', 'lomba.id_lomba = soal.id_lomba', 'left');

        $query = $builder->get();
        return $query->getResult();
    }
}
