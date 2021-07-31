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

        $respond['data'] = $data;
        $respond['status'] = 'success';
        return $this->respond($respond);
    }

    public function create()
    {
        if (!$this->validate('insertPeople')) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $data['foto'] = $this->request->getFile('file')->store('img/', $data['id'] . '.jpg');;
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
        $data['foto'] = $this->request->getFile('file')->store('img/', $data['id'] . '.jpg');
        if ($this->model->update($id, $data)) {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            $respond['message'] = 'Data berhasil diubah';
            return $this->respondUpdated($respond, $respond['message']);
        }
    }

    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            $respond['status'] = 'success';
            $respond['message'] = $id . ' berhasil dihapus';
            return $this->respondDeleted($respond, $respond['message']);
        }

        if (!$$this->model->find($id)) {
            return $this->failNotFound('id ' . $id . ' tidak ditemukan');
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


    public function showByName($name = null)
    {
        $data = $this->model->findByName($name);
        if ($data) {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            return $this->respond($respond);
        }
        return $this->failNotFound('id ' . $name . ' tidak ditemukan');
    }

    public function new()
    {
        return view('peserta/register');
    }
}
