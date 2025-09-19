<?php

namespace App\Models;

use CodeIgniter\Model;

class DoaModel extends Model
{
    protected $table = 'doa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['deskripsi'];
    protected $useTimestamps = true;
}
