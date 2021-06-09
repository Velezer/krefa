<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MySeeder extends Seeder
{
	public function run()
	{
		$dataEvents = [
		'tema' => 'Iman',
		'judul' => 'Finding The Light',
		'pembicara' => 'Ust. Aaz',
		'level' => 'berat',
		'konsep' => 'biasa',
		'tempat' => 'SSC'
		];

		$dataPeople = [
			'nama' => 'arief',
			'whatsapp' => '6273671238',
			'alamat' => 'Kudus'
		];

		$this->db->table('events')->insert($dataEvents);
		$this->db->table('people')->insert($dataPeople);
	}
}
