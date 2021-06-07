<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class EventsApi extends ResourceController
{
    protected $modelName = 'App\Models\EventsModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function create()
    {
        $data = $this->request->getPost();
        
        
        if($this->model->insert($data))
        {
            return $this->respondCreated($data);
        }
        
        
    }
}