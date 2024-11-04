<?php

namespace App\Models;

use CodeIgniter\Model;

class SubmitTugasModel extends Model
{
    protected $table = 'submit_pengumpulan';
    protected $primaryKey = 'id_submit_pengumpulan';
    protected $allowedFields = [
        'tim',
        'ketua',
        'lomba',
        'pembimbing',
        'sekolah',
        'link_tugas'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
