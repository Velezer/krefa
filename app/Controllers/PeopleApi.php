<?php

namespace App\Controllers;

use CodeIgniter\CodeIgniter;
use CodeIgniter\HTTP\Request;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Validation\Validation;

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
        $id = $data['id'];
        if ($this->model->find($id)) {
            return $this->failResourceExists('id ' . $id . ' sudah dipakai'); // code: 409
        }

        $file = $this->request->getFile('file');
        if ($file->move('img/', $data['id'] . '.jpg')) {
            $data['foto'] = 'img/' . $file->getName();
        }

        if ($this->model->insert($data, false)) {
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

        // $data = $this->request->getRawInput();
        $data = $this->request->getVar();

        if (!$this->validate('updatePeople')) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data['id'] = $id;
        $file = $this->request->getFile('file');
        if ($file->move('img/', $data['id'] . '.jpg')) {
            $data['foto'] = 'img/' . $file->getName();
        }
        if ($this->model->update($id, $data)) {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            $respond['message'] = 'Data berhasil diubah';
            return $this->respondUpdated($respond, $respond['message']);
        }
    }

    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('id ' . $id . ' tidak ditemukan');
        }

        if ($this->model->delete($id)) {
            $respond['status'] = 'success';
            $respond['message'] = $id . ' berhasil dihapus';
            return $this->respondDeleted($respond, $respond['message']);
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
