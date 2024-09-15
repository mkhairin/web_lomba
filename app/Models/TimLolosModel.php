<?php

namespace App\Models;

use CodeIgniter\Model;

class TimLolosModel extends Model
{
    protected $table = 'tim_lolos';
    protected $primaryKey = 'id_tim_lolos';
    protected $allowedFields = [
        'id_tim_lomba',
        'id_lomba',
        'id_sekolah',
        'id_pembimbing',
        'nilai',
        'status'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tim_lolos');
        $builder->select('tim_lolos.*, tim_lomba.nama_tim, sekolah.nama_sekolah, lomba.nama, pembimbing.nama_pembimbing');
        $builder->join('tim_lomba', 'tim_lomba.id_tim_lomba = tim_lolos.id_tim_lomba', 'left');
        $builder->join('sekolah', 'sekolah.id_sekolah = tim_lolos.id_sekolah', 'left');
        $builder->join('lomba', 'lomba.id_lomba = tim_lolos.id_lomba', 'left');
        $builder->join('pembimbing', 'pembimbing.id_pembimbing = tim_lolos.id_pembimbing', 'left');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataWhere($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tim_lolos');
        $builder->select('tim_lolos.*, tim_lomba.nama_tim, sekolah.nama_sekolah, lomba.nama, pembimbing.nama_pembimbing');
        $builder->join('tim_lomba', 'tim_lomba.id_tim_lomba = tim_lolos.id_tim_lomba', 'left');
        $builder->join('sekolah', 'sekolah.id_sekolah = tim_lolos.id_sekolah', 'left');
        $builder->join('lomba', 'lomba.id_lomba = tim_lolos.id_lomba', 'left');
        $builder->join('pembimbing', 'pembimbing.id_pembimbing = tim_lolos.id_pembimbing', 'left');
        // Menggunakan where secara eksplisit untuk fleksibilitas
        $builder->where('nama', $params);
        $query = $builder->get();
        return $query->getResult();
    }


}
