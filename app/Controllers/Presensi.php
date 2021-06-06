<?php

namespace App\Controllers;

class Presensi extends BaseController
{
	public function index()
	{
		return view('presensi/index');
	}
	
	public function input()
	{
		return view('presensi/input');
	}
}
