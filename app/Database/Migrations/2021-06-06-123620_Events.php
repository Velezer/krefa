<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Events extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'tema' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'judul' => [
				'type'         => 'VARCHAR',
				'constraint'   => 255
			],
			'pembicara' => [
				'type'        => 'VARCHAR',
				'constraint'  => 255
			],
			'level' => [
				'type' => 'VARCHAR',
				'constraint' => 20
			],
			'konsep' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'tempat' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'keterangan_tambahan' => [
				'type' => 'TEXT',
				'null' => true
			]
		]);


		$this->forge->addPrimaryKey('id');

		$this->forge->createTable('events', true);
	}

	public function down()
	{
		// if ($this->forge->dropDatabase('ci4'))
		// {
		// 	echo 'Database deleted!';
		// }

	}
}
