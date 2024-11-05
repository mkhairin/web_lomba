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
        'link_tugas',
        'status_pengumpulan',
        'status_penilaian',
        'tgl',
        'jam'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function getDataWhere($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('submit_pengumpulan');
        $builder->select();
        $builder->where('lomba', $params);
        $builder->where('status_penilaian', 'Belum Dinilai');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataAfterWhere($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('submit_pengumpulan');
        $builder->select();
        $builder->where('lomba', $params);
        $builder->where('status_penilaian', 'Sudah Dinilai');
        $query = $builder->get();
        return $query->getResult();
    }
}
