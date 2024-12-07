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

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tim_lolos_new');
        $builder->select();
        $builder->where('status', 'Lolos');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataNotLolos()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tim_lolos_new');
        $builder->select();
        $builder->where('status', 'Belum Lolos');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataWhereTim($params, $namaTimLomba)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tim_lolos_new');
        $builder->select();
        $builder->where('lomba', $params);
        $builder->where('tim', $namaTimLomba);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataWhere($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tim_lolos_new');
        $builder->select();
        $builder->where('lomba', $params);
        $builder->where('status', 'Lolos');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataWhereNotLolos($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tim_lolos_new');
        $builder->select();
        $builder->where('lomba', $params);
        $builder->where('status', 'Belum Lolos'); // Misalnya, 0 menandakan belum lolos
        $query = $builder->get();
        return $query->getResult();
    }
}
