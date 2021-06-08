<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class PeopleApi extends ResourceController
{
    protected $modelName = 'App\Models\PeopleModel';
    protected $format    = 'json';
    
    
    public function __construct(){
        
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function create()
    {
        $data = $this->request->getPost();
        
        $validate = $this->validation->run($data, 'insertPeople');
        $errors = $this->validation->getErrors();
        
        if ($errors){
            return $this->fail($errors);
        }
        
        if($this->model->insert($data))
        {
            return $this->respondCreated($data, 'Data berhasil ditambahkan');
        }
        
        
    }
    
    public function update($id = null)
    {
        if(!$this->model->find($id))
        {
            return $this->failNotFound('id '.$id.' tidak ditemukan');
        }
        $data = $this->request->getRawInput();
        $data['id'] = $id;
        
        $validate = $this->validation->run($data, 'insertPeople');
        $errors = $this->validation->getErrors();
        
        if ($errors){
            return $this->fail($errors);
        }
        
        if($this->model->update($id, $data))
        {
            return $this->respondUpdated($data, 'Data berhasil diubah');
        }
    }
    
    public function delete($id = null)
    {
        if(!$this->model->find($id))
        {
            return $this->failNotFound('id '.$id.' tidak ditemukan');
        }
        
        if($this->model->delete($id))
        {
            return $this->respondDeleted(['id' => $id, 'message' => 'id '.$id.' berhasil dihapus']);
        }
    }
    
    public function show($id = null){
        $data = $this->model->find($id);
        if($data){
            return $this->respond($data);
        }
        return $this->failNotFound('id '.$id.' tidak ditemukan');
    }
    
}