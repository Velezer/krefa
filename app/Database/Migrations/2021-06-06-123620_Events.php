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
		    'title' => [
		        'type'         => 'VARCHAR',
		        'constraint'   => 255
		    ],
		    'speaker' => [
		        'type'        => 'VARCHAR',
		        'constraint'  => 255
		      ]
		  ]);
		    
		$this->forge->createDatabase('ci4', true);

		$this->forge->addPrimaryKey('id');
 
		$this->forge->createTable('events', true);
	 
	}

	public function down()
	{
		//
	}
}
