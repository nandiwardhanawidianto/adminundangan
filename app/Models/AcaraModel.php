<?php

namespace App\Models;

use CodeIgniter\Model;

class AcaraModel extends Model
{
    protected $table = 'acara';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'tanggal',
        'nama_acara',
        'deskripsi_waktu',
        'deskripsi_alamat',
        'link_maps'
    ];
    protected $useTimestamps = true;
}

