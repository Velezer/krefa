<?php

namespace App\Models;

use CodeIgniter\Model;

class OauthClientModel extends Model
{
	protected $table                = 'oauth_clients';
	protected $primaryKey           = 'client_id';
	protected $allowedFields        = ['client_id', 'client_secret', 'grant_types', 'scope'];
}
