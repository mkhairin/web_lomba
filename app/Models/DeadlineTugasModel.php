<?php

namespace App\Models;

use CodeIgniter\Model;

class DeadlineTugasModel extends Model
{
    protected $table            = 'deadline';
    protected $primaryKey       = 'id_deadline';
    protected $allowedFields = [
        'id_lomba',
        'deskripsi',
        'deadline'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
