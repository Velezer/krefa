<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class AttendanceApi extends ResourceController
{
	protected $modelName = 'App\Models\AttendanceModel';
    protected $format    = 'json';

	public function index()
	{
		$data = $this->model->showAll();
        
        if ($data || $data == []) {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            return $this->respond($respond);
        }
	}


	public function create() // saya hadir
	{
		// if (!$this->validate('insertPeople')) {
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

		// validate belum hadir

        $data = $this->request->getVar();
        if ($this->model->insert($data)) {
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
        // if (!$this->validate('insertEvent')){
        //     return $this->failValidationErrors($this->validator->getErrors());
        // }

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

    

	public function showPeopleByEvents($id = null) // info kehadiran per event
	{
		$data = $this->model->findPeopleByEventsId($id);

        if ($data) {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            return $this->respond($respond);
        }
        return $this->failNotFound('id ' . $id . ' tidak ditemukan');
	}

    public function showEventsByPeople($id = null) // info kehadiran per event
	{
		$data = $this->model->findEventsByPeopleId($id);

        if ($data) {
            $respond['data'] = $data;
            $respond['status'] = 'success';
            return $this->respond($respond);
        }
        return $this->failNotFound('id ' . $id . ' tidak ditemukan');
	}


    public function new()
	{
		return view('presensi/register');
	}

    public function edit($id = null)
	{
		return view('presensi/register');
	}

}
