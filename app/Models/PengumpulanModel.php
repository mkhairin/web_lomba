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
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
