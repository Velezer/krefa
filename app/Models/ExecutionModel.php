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
	// protected $dateFormat           = 'datetime';
	protected $createdField         = 'hadir_pada';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';


}
