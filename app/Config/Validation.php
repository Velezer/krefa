<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
		\Myth\Auth\Authentication\Passwords\ValidationRules::class
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $insertEvent = [
		'judul' => 'required',
		'pembicara' => 'required',
		'tempat' => 'required',
		'tanggal' => 'required|valid_date[Y-m-d]'
	];

	public $insertPeople = [
		'id' => 'required',
		'nama' => 'required',
		'whatsapp' => 'required|max_length[16]|min_length[9]',
		'alamat' => 'required',
		'file' => 'uploaded[file]|max_size[file,2048]|is_image[file]'
	];

	public $updatePeople = [
		// 'id' => 'required',
		'nama' => 'required',
		'whatsapp' => 'required|max_length[16]|min_length[9]',
		'alamat' => 'required',
		'file' => 'uploaded[file]|max_size[file,2048]|is_image[file]'
	];

	public $oauthRegister = [
		'username' => 'required',
		'password' => 'required',
		'scope' => 'required',
		'client_id' => 'required',
		'client_secret' => 'required',
		'grant_types' => 'required'
	];

	public $hadir = [
		'id_events' => 'required',
		'id_people' => 'required',
	];
}
