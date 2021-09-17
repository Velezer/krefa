<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MySeeder extends Seeder
{
	public function run()
	{
		$dataEvents = [
			'judul' => static::faker()->words(2, true),
			'pembicara' => static::faker()->title . ' ' . static::faker()->name,
			'tempat' => static::faker()->company,
			'tanggal' => static::faker()->date(),
		];

		$dataPeople = [
			'id' => 1,
			'foto' => static::faker()->imageUrl(),
			'nama' => static::faker()->name,
			'whatsapp' => static::faker()->phoneNumber,
			'alamat' => static::faker()->address,
			'tanggal_lahir' => static::faker()->date(),
			'status_kerja' => 'Kerja',
			'status_sekolah' => 'Kuliah',
		];

		$dataExecution = [
			'id_events' => 1,
			'id_people' => 1
		];



		$this->db->table('people')->insert($dataPeople);
		$this->db->table('events')->insert($dataEvents);
		$this->db->table('attendance')->insert($dataExecution);



		$dataOauthUser = [
			'username' => 'krefa',
			'password' => sha1('krefa'),
			'scope' => 'app',
		];

		$dataOauthClient = [
			'client_id' => 'krefa',
			'client_secret' => 'krefa',
			'scope' => 'app',
			'grant_types' => 'password',
		];

		$this->db->table('oauth_users')->insert($dataOauthUser);
		$this->db->table('oauth_clients')->insert($dataOauthClient);
	}
}
