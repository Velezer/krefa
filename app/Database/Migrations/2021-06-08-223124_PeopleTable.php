<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PeopleTable extends Migration
{
	public function up()
	{

		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'whatsapp' => [
				'type' => 'VARCHAR',
				'constraint' => 16
			],
			'alamat' => [
				'type' => 'TEXT',
			]
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('people', true);

	}

	public function down()
	{
		$this->forge->dropTable('people', true);
	}
}
