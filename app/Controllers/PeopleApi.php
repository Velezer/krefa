<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class PeopleApi extends ResourceController
{
    protected $modelName = 'App\Models\PeopleModel';
    protected $format    = 'json';



    public function index()
    {
        $data = $this->model->findAll();
        
        if ($data || $data == []) {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            return $this->respond($respond);
        }
    }

    public function create()
    {
        if (!$this->validate('insertPeople')) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = $this->request->getPost();
        if ($this->model->insert($data)) {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            $respond['message'] = 'Data berhasil ditambahkan';
            return $this->respondCreated($respond, $respond['message']);
        }
    }

    public function update($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('id ' . $id . ' tidak ditemukan');
        }

        if (!$this->validate('insertPeople')) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = $this->request->getRawInput();
        $data['id'] = $id;
        if ($this->model->update($id, $data)) {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            $respond['message'] = 'Data berhasil diubah';
            return $this->respondUpdated($respond, $respond['message']);
        }
    }

    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return $this->failNotFound('id ' . $id . ' tidak ditemukan');
        }
        
        if ($this->model->delete($id)) {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            $respond['message'] = 'Data berhasil dihapus';
            return $this->respondDeleted([$respond, $respond['message']]);
        }
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            return $this->respond($respond);
        }
        return $this->failNotFound('id ' . $id . ' tidak ditemukan');
    }


}
