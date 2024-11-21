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

    public function get()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tim_lolos_new');
        $builder->select();
        $builder->where('status', 'lolos');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataWhere($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tim_lolos_new');
        $builder->select();
        $builder->where('lomba', $params);
        $query = $builder->get();
        return $query->getResult();
    }
}
