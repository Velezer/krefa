<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

class EventsPresenter extends ResourcePresenter
{

    protected $modelName = 'App\Models\EventsModel';

    public function index()
    {
        return view('events/index', $this->model->findAll());
    }

    // ...
}