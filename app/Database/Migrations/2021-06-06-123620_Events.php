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
		    'judul' => [
		        'type'         => 'VARCHAR',
		        'constraint'   => 255
		    ],
		    'pembicara' => [
		        'type'        => 'VARCHAR',
		        'constraint'  => 255
		      ]
		  ]);
		    
		$this->forge->createDatabase('ci4', true);

		$this->forge->addPrimaryKey('id');
 
		$this->forge->createTable('krefa', true);
	 
	}

	public function down()
	{
		//
	}
}
