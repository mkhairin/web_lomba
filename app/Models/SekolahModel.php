<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    protected $table = 'sekolah';
    protected $primaryKey = 'id_sekolah';
    protected $allowedFields = [
        'nama_sekolah',
        'alamat',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sekolah');
        $query = $builder->get();
        return $query->getResult();
    }

    public function insertData($data)
    {
        $db     =   \Config\Database::connect();
        $builder = $db->table('sekolah');
        $builder->insert($data);
    }

    public function updateData($id, $data)
    {
        $this->update($id, $data);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sekolah');
        $builder->where('id_sekolah', $id);
        $builder->delete();
    }
}
