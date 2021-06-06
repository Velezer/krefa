<?php

namespace App\Models;

use CodeIgniter\Model;

class EventsModel extends Model
{
    $table = 'events';
    $allowedFields = ['judul', 'pembicara', 'tipe'];
}