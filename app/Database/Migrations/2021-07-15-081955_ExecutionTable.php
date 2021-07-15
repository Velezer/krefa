<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExecutionTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			], 'id_events'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			], 'id_people'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			], 'hadir_pada' => [
				'type' => 'DATETIME',
				'null' => true
			], 'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			]
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('id_events', 'events', 'id');
		$this->forge->addForeignKey('id_people', 'people', 'id');
		$this->forge->createTable('execution', true);
	}

	public function down()
	{
		$this->forge->dropTable('execution', true);
	}
}
