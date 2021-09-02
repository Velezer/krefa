<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MySeeder extends Seeder
{
	public function run()
	{
		$dataEvents = [
		'judul' => static::faker()->theme,
		'pembicara' => static::faker()->title .' '. static::faker()->name,
		'tempat' => static::faker()->company,
		'tanggal' => static::faker()->date(),
		];

		$dataPeople = [
			'id' =>static::faker()->id,
			'foto' => static::faker()->imageUrl(),
			'nama' => static::faker()->name,
			'whatsapp' => static::faker()->phoneNumber,
			'alamat' => static::faker()->address,
			'tahun_lahir'=>static::faker()->date(),
		];

		$dataExecution = [
			'id_events' => 1,
			'id_people' => 1
		];

		$this->db->table('people')->insert($dataPeople);
		$this->db->table('events')->insert($dataEvents);
		$this->db->table('attendance')->insert($dataExecution);
	}
}
