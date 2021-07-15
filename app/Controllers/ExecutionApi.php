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

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		//
	}

	/**
	 * Return a new resource object, with default properties
	 *
	 * @return mixed
	 */
	public function new()
	{
		//
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
	 * Return the editable properties of a resource object
	 *
	 * @return mixed
	 */
	public function edit($id = null)
	{
		//
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
		//
	}
}
