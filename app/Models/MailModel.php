<?php

namespace App\Models;

use CodeIgniter\Model;

class MailModel extends Model
{
    protected $table            = 'sent_emails';
    protected $primaryKey       = 'id_emails';
    protected $allowedFields = [
        'name',
        'email',
        'subject',
        'message',
        'status',
        'tgl',
        'jam'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getdata()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sent_emails');
        $builder->orderBy('jam', 'ASC');
        $query = $builder->get();
        return $query->getResult();
    }
}
