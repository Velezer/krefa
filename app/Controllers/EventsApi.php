<?php

namespace App\Controllers;

// use App\Models\EventsModel;
use CodeIgniter\RESTful\ResourceController;

class EventsApi extends ResourceController
{
    protected $modelName = 'App\Models\EventsModel';
    protected $format    = 'json';
    

    
    public function index()
    {
        $data = $this->model->findAll();
        
        if($data || $data == []){
            $respond['data'] = $data;
            $respond['status'] = 'success';
            return $this->respond($respond);
        }
    }

    public function create()
    {
        if (!$this->validate('insertEvent')){
            return $this->failValidationErrors($this->validator->getErrors());
        }

        
        $data = $this->request->getPost();
        if($this->model->insert($data))
        {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            $respond['message'] = 'Data berhasil ditambahkan';
            return $this->respondCreated($respond, $respond['message']);
        }
        
        
    }
    
    public function update($id = null)
    {
        // Check id
        if(!$this->model->find($id))
        {
            return $this->failNotFound('id '.$id.' tidak ditemukan');
        }
        // Validation
        if (!$this->validate('insertEvent')){
            return $this->failValidationErrors($this->validator->getErrors());
        }
        // Data
        $data = $this->request->getRawInput();
        $data['id'] = $id;
        if($this->model->update($id, $data))
        {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            $respond['message'] = 'Data berhasil diubah';
            return $this->respondUpdated($respond, $respond['message']);
        }
    }
    
    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if(!$data) //tidak ditemukan
        {
            return $this->failNotFound('id '.$id.' tidak ditemukan');
        }
        
        if($this->model->delete($id))
        {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            $respond['message'] = 'Data berhasil dihapus';
            return $this->respondDeleted([$respond, $respond['message']]);
        }
    }
    
    public function show($id = null){
        $data = $this->model->find($id);

        if($data){
            $respond['data'] = $data;
            $respond['status'] = 'success';
            return $this->respond($respond);
        }
        return $this->failNotFound('id '.$id.' tidak ditemukan');
    }
    
}