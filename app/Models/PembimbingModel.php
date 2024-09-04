<?php

namespace App\Models;

use CodeIgniter\Model;

class PembimbingModel extends Model
{
    protected $table = 'pembimbing';
    protected $primaryKey = 'id_pembimbing';
    protected $allowedFields = [
        'id_sekolah',
        'nama_pembimbing',
        'lomba'
    ];

    public function getDataPembimbing()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pembimbing');
        $builder->select('pembimbing.*, sekolah.nama_sekolah'); // Ambil kolom yang diperlukan
        $builder->join('sekolah', 'sekolah.id_sekolah = pembimbing.id_sekolah');
        $query = $builder->get();
        return $query->getResult(); // Mengembalikan hasil sebagai objek
    }

    public function insertData($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pembimbing');
        $builder->insert($data);
    }

    public function updateData($id, $data)
    {
        $this->update($id, $data);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pembimbing');
        $builder->where('id_pembimbing', $id);
        $builder->delete();
    }
}
