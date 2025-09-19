<?php namespace App\Models;

use CodeIgniter\Model;

class InvitationModel extends Model
{
    protected $table = 'invitations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_mempelai', 'background_photo'];
}
