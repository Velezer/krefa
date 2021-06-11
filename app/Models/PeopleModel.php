<?php

namespace App\Models;

use CodeIgniter\Model;

class PeopleModel extends Model
{
    protected $table = 'people';
    protected $primaryKey = 'id';
    protected $allowedFields = ['foto', 'nama', 'whatsapp', 'alamat'];
}