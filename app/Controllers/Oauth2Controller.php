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
}
