<?php

namespace App\Models;

use CodeIgniter\Model;

class ExecutionModel extends Model
{
	protected $table                = 'execution';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['id_events', 'id_people'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'hadir_pada';
	protected $updatedField         = 'updated_at';
	// protected $deletedField         = 'deleted_at';

	public function findPeopleByEventsId($id){
		return $this->db->table('execution')
		->select('*')
		->where('id_events', $id)
		// ->join('events', 'execution.id_events = events.id')
		->join('people', 'execution.id_people = people.id')
		->get()->getResultArray();
	}
	public function findEventsByPeopleId($id){
		return $this->db->table('execution')
		->select('*')
		->where('id_events', $id)
		->join('events', 'execution.id_events = events.id')
		// ->join('people', 'execution.id_people = people.id')
		->get()->getResultArray();
	}
}
