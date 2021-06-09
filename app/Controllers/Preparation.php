<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Preparation extends BaseController
{
	public function index()
	{
		try {
			shell_exec('php ../spark db:create ci4');
			echo 'Sukses membuat database ci4 <br>';
			
			shell_exec('php ../spark migrate:refresh');
			echo 'Sukses migrate database <br>';

			shell_exec('php ../spark db:seed MySeeder');
			shell_exec('php ../spark db:seed MySeeder');
			shell_exec('php ../spark db:seed MySeeder');
			echo 'Sukses mengisi database pakai seeder sebanyak 3 rows';
		} catch (\Throwable $th) {
			echo '<br>ERROR GAN!!!<br>';
			echo $th;
		}
	}
}
