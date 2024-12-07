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


    public function getDataWhere($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('deadline');
        $builder->select('deadline.*, lomba.nama AS nama_lomba'); // Pilih kolom yang diperlukan
        $builder->join('lomba', 'lomba.id_lomba = deadline.id_lomba', 'left');
        $builder->where('lomba.nama', $params); // Sesuaikan kolom yang relevan, di sini 'nama' dari tabel 'lomba'
        $query = $builder->get();
        return $query->getResult();
    }
    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('deadline');
        $builder->select('deadline.*, lomba.nama AS nama_lomba'); // Pilih kolom yang diperlukan
        $builder->join('lomba', 'lomba.id_lomba = deadline.id_lomba', 'left'); // Sesuaikan kolom yang relevan, di sini 'nama' dari tabel 'lomba'
        $query = $builder->get();
        return $query->getResult();
    }
}
