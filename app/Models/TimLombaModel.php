<?php

namespace App\Models;

use CodeIgniter\Model;

class TimLombaModel extends Model
{
    protected $table = 'tim_lomba';
    protected $primaryKey = 'id_tim_lomba';
    protected $allowedFields = [
        'id_sekolah',
        'id_lomba',
        'id_pembimbing',
        'nama_tim',
        'ketua_tim',
        'anggota',
        'no_ketua'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tim_lomba');
        $builder->select('tim_lomba.*, sekolah.nama_sekolah, lomba.nama, pembimbing.nama_pembimbing');
        $builder->join('sekolah', 'sekolah.id_sekolah = tim_lomba.id_sekolah', 'left');
        $builder->join('lomba', 'lomba.id_lomba = tim_lomba.id_lomba', 'left');
        $builder->join('pembimbing', 'pembimbing.id_pembimbing = tim_lomba.id_pembimbing', 'left');
        $query = $builder->get();
        return $query->getResult();
    }

    public function insertData($data)
    {
        $db     = \Config\Database::connect();
        $builder   = $db->table('tim_lomba');
        $builder->insert($data);
    }

    public function updateData($id, $data)
    {
        $this->update($id, $data);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tim_lomba');
        $builder->where('id_tim_lomba', $id);
        $builder->delete();
    }
}
