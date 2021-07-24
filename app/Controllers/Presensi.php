<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

use function PHPUnit\Framework\throwException;

class Presensi extends BaseController
{
	public function index($id = null)
	{
		if ($id == null) {
			throw PageNotFoundException::forPageNotFound();
		}
		return view('presensi/find');
	}
	

}
