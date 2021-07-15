<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MySeeder extends Seeder
{
	public function run()
	{
		$dataEvents = [
		'tema' => 'Iman',
		'judul' => 'From Darkness',
		'pembicara' => static::faker()->title .' '. static::faker()->name,
		'tempat' => static::faker()->company,
		'keterangan_tambahan' => static::faker()->text,
		'tanggal' => static::faker()->date(),
		'people_id' => [1,2]
		];

		$dataPeople = [
			'foto' => static::faker()->imageUrl(),
			'nama' => static::faker()->name,
			'whatsapp' => static::faker()->phoneNumber,
			'alamat' => static::faker()->address
		];

		$this->db->table('people')->insert($dataPeople);
		$this->db->table('people')->insert($dataPeople);
		$this->db->table('events')->insert($dataEvents);
	}
}
