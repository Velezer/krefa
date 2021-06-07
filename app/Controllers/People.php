<?php

namespace App\Controllers;

class People extends BaseController
{
	public function index()
	{
		return view('people/index');
	}
}
