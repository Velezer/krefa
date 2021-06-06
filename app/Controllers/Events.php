<?php

namespace App\Controllers;
use App\Models\EventsModel

class Events extends BaseController
{
    protected eventsmodel;
	
	public function __construct()
	{
	    this->eventsmodel = new EventsModel();
	}
	public function index()
	{
	    events = this->eventsmodel->findAll();
		return view('events/index');
	}
}
