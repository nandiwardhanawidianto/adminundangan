<?php

namespace App\Models;

use CodeIgniter\Model;

class MempelaiModel extends Model
{
    protected $table = 'mempelai';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'foto_pengantin_1',
        'nama_pengantin_1',
        'deskripsi_pengantin_1',
        'foto_pengantin_2',
        'nama_pengantin_2',
        'deskripsi_pengantin_2'
    ];
    protected $useTimestamps = true;
}
