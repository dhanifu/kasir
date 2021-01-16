<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository {

	public $model;

	public function __construct(User $user)
	{
		$this->model = $user;
	}

	public function get(): Object
	{
		return $this->model->get(['id', 'name', 'email', 'role', 'photo']);
	}
	
}