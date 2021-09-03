<?php

namespace App\Models;

use CodeIgniter\Model;

class OauthUserModel extends Model
{
	protected $table                = 'oauth_users';
	protected $primaryKey           = 'username';
	protected $allowedFields        = ['username', 'password', 'scope'];

	protected $beforeInsert = ['beforeInsert'];

	protected function beforeInsert($data)
	{
		$data['data']['password'] = sha1($data['data']['password']);
		return $data;
	}
}
