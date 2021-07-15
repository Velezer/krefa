<?php

namespace App\Models;

use CodeIgniter\Model;

class EventsModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'pembicara', 'tempat', 'tanggal', 'people_id'];
    
    // public function getData(){
    //     return $this->db->table('events')
    //     ->join('people', 'events.people_id = people.id')
    //     ->get()->getResultArray();
    // }
}