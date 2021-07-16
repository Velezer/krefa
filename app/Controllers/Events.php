<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Events extends BaseController
{
	public function index()
	{
		//
	}



	public function register()
	{
		return view('events/register');
	}
}
