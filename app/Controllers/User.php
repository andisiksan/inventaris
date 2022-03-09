<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

	public function index()
	{
		$user = $this->userModel->where(['email' => session()->get('email')])->first();

		$data = [
            'title' => 'My Profile',
            'user' => $user,
			'var' => 'user',
		];
		return view('user/index', $data);
	}
	
}