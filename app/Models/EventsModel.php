<?php

namespace App\Models;

use CodeIgniter\Model;

class EventsModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tema', 'judul', 'pembicara', 'tempat', 'keterangan_tambahan', 'tanggal', 'people_id'];
    
    // public function getData(){
    //     return $this->db->table('events')
    //     ->join('people', 'events.people_id = people.id')
    //     ->get()->getResultArray();
    // }
}