<?php

namespace App\Models;

use CodeIgniter\Model;

class LoveGiftModel extends Model
{
    protected $table = 'love_gift';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_bank','no_rek','deskripsi'];
    protected $useTimestamps = true;
}
