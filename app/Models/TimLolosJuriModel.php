<?php

namespace App\Models;

use CodeIgniter\Model;

class TimLolosJuriModel extends Model
{
    protected $table = 'tim_lolos_new';
    protected $primaryKey = 'id_tim_lolos';
    protected $allowedFields = [
        'id_tim_lolos',
        'ketua',
        'tim',
        'lomba',
        'pembimbing',
        'sekolah',
        'skor_nilai',
        'status'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';



}
