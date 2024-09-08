<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table = 'peserta';
    protected $primaryKey = 'id_peserta';
    protected $allowedFields = [
        'id_lomba',
        'id_pembimbing',
        'id_sekolah',
        'nama_peserta'
    ];

    public function getDataPeserta()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('peserta');
        // Ambil kolom yang diperlukan dari tabel peserta, pembimbing, sekolah, dan lomba
        $builder->select('peserta.*, pembimbing.nama_pembimbing, sekolah.nama_sekolah, lomba.nama'); 
        // Join ke tabel lomba
        $builder->join('lomba', 'lomba.id_lomba = peserta.id_lomba', 'left');
        // Join ke tabel pembimbing
        $builder->join('pembimbing', 'pembimbing.id_pembimbing = peserta.id_pembimbing', 'left');
        // Join ke tabel sekolah
        $builder->join('sekolah', 'sekolah.id_sekolah = pembimbing.id_sekolah', 'left');
        // Eksekusi query
        $query = $builder->get();
    
        return $query->getResult(); // Mengembalikan hasil sebagai objek
    }
    

    public function insertData($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('peserta');
        $builder->insert($data);
    }

    public function updateData($id, $data)
    {
        $this->update($id, $data);
    }

    public function deleteData($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('peserta');
        $builder->where('id_peserta', $id);
        $builder->delete();
    }
}
