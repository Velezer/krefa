<?php

namespace App\Models;

use CodeIgniter\Model;

class EventsModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tema', 'judul', 'pembicara','level', 'konsep', 'tempat', 'keterangan_tambahan', 'tanggal'];
}