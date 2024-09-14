<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'username',
        'password',
        'id_sekolah',
        'id_tim_lomba',
        'id_lomba',
        'roles',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.*, sekolah.nama_sekolah, tim_lomba.nama_tim,  lomba.nama');
        $builder->join('sekolah', 'sekolah.id_sekolah = users.id_sekolah', 'left');
        $builder->join('tim_lomba', 'tim_lomba.id_tim_lomba = users.id_tim_lomba', 'left');
        $builder->join('lomba', 'lomba.id_lomba = users.id_lomba', 'left');
        $query = $builder->get();
        return $query->getResult();
    }

}
