<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceModel extends Model
{
	protected $table                = 'attendance';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['id_events', 'id_people'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'hadir_pada';
	protected $updatedField         = 'updated_at';
	// protected $deletedField         = 'deleted_at';

	// public function showAll(){
	// 	return $this
	// 	->select('*')
	// 	->join('events', 'attendance.id_events = events.id')
	// 	->join('people', 'attendance.id_people = people.id')
	// 	->get()->getResultArray();
	// }
	public function findData($idEvents, $idPeople){
		return $this
		->select('*')
		->where('id_events', $idEvents)
		->where('id_people', $idPeople)
		->get()->getResultArray();
	}
	public function findPeopleByEventsId($id){
		return $this
		->select('*')
		->where('id_events', $id)
		->join('people', 'attendance.id_people = people.id')
		->join('events', 'attendance.id_events = events.id')
		->get()->getResultArray();
	}
	public function findEventsByPeopleId($id){
		return $this
		->select('*')
		->where('id_people', $id)
		->join('events', 'attendance.id_events = events.id')
		->join('people', 'attendance.id_people = people.id')
		->get()->getResultArray();
	}
}
