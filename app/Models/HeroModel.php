<?php

namespace App\Models;

use CodeIgniter\Model;

class HeroModel extends Model
{
    protected $table = 'hero';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_mempelai', 'foto_background', 'tanggal_acara'];
    protected $useTimestamps = true; // otomatis isi created_at & updated_at
}
