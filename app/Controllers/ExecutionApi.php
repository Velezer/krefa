<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ExecutionApi extends ResourceController
{
	protected $modelName = 'App\Models\ExecutionModel';
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


	public function show($id = null)
	{
		$data = $this->model->findPeopleByEventsId($id);

        if ($data) {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            return $this->respond($respond);
        }
        return $this->failNotFound('id ' . $id . ' tidak ditemukan');
	}


	public function create()
	{
		// if (!$this->validate('insertPeople')) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

        $data = $this->request->getVar();
        if ($this->model->insert($data)) {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            $respond['message'] = 'Data berhasil ditambahkan';
            return $this->respondCreated($respond, $respond['message']);
        }
	}


	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		//
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
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
}
