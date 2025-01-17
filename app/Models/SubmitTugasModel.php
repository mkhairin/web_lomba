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
        'skor_nilai',
        'feedback',
        'tgl',
        'jam'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function getData($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('submit_pengumpulan');
        $builder->select();
        $builder->where('lomba', $params);
        $builder->orderBy('created_at', 'DESC'); // Urutkan berdasarkan kolom created_at secara descending
        $query = $builder->get();
        return $query->getResult();
    }


    public function getDataSubmit()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('submit_pengumpulan');
        $builder->select();
        $builder->where('status_pengumpulan', 'Telah Submit');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataNotSubmit()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('submit_pengumpulan');
        $builder->select();
        $builder->where('status_pengumpulan', '');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataWhereTeam($params, $namaTimLomba)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('submit_pengumpulan');
        $builder->select();
        $builder->where('lomba', $params);
        $builder->where('tim', $namaTimLomba);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataWhereTeamPenilaian($params, $namaTimLomba)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('submit_pengumpulan');
        $builder->select();
        $builder->where('lomba', $params);
        $builder->where('status_penilaian', 'Sudah Dinilai');
        $builder->where('tim', $namaTimLomba);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataWhere($params)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('submit_pengumpulan');
        $builder->select();
        $builder->where('lomba', $params);
        $builder->where('status_penilaian', 'Belum Dinilai');
        $builder->orderBy('created_at', 'DESC');
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
