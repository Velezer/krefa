<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Oauth2Controller extends ResourceController
{
	public function login()
	{
		$oauth2 = new \App\Libraries\Oauth2Server();
		$server = $oauth2->server;

		$request = \OAuth2\Request::createFromGlobals();

		$response = $server->handleTokenRequest($request);

		$code = $response->getStatusCode();
		$body = $response->getResponseBody();

		$body = json_decode($body);
		return $this->respond($body, $code);
	}

	function __construct()
	{
		$this->user = new \App\Models\OauthUserModel;
		$this->client = new \App\Models\OauthClientModel;
	}


	public function register()
	{
		if (!$this->validate('oauthRegister')) {
			return $this->failValidationErrors($this->validator->getErrors());
		}

		$data = $this->request->getPost();

		$this->user->db->transStart();
		$this->client->insert($data);
		$this->user->insert($data);
		
		if ($this->user->db->transComplete()) {
			unset($data['password']);
			unset($data['secret']);
			return $this->respondCreated($data, "Created");
		}

		return $this->failServerError();
	}
}
