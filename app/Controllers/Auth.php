<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/login', $data);
    }

    public function registration()
    {
        // return view('welcome_message');
        $data = [
            'title' => 'Registration',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/registration', $data);
    }

    public function register()
    {
        if (!$this->validate([
            'name' => [
                'label'  => 'Name',
                'rules' => 'required',

            ],

            'email' => [
                'label'  => 'Email',
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'is_unique' => 'This Email has already registered.'
                ]
            ],

            'password1' => [
                'label'  => 'Password',
                'rules' => 'required|min_length[3]|matches[password2]',
                'errors' => [
                    'matches' => 'Password dont match.',
                    'min_length' => 'Password too short.',
                ]
            ],

            'password2' => [
                'label'  => 'Repeat Password',
                'rules' => 'required|matches[password1]'
            ]

        ])) {

            // $validation = \Config\Services::validation();

            // return redirect()->to('/product/create')->withInput()->with('validation', $validation);
            return redirect()->to('/auth/registration')->withInput();
        }

        $this->userModel->save([
            'name' => htmlspecialchars($this->request->getVar('name')),
            'email' => htmlspecialchars($this->request->getVar('email')),
            'image' => 'defaultUser.jpg',
            'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1
        ]);

        session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Congratulation! Your account has been created. Please login');

        return redirect()->to('/auth');
    }

    public function login()
    {

        if (!$this->validate([
            'email' => [
                'label'  => 'Email',
                'rules' => 'required|valid_email'
            ],

            'password' => [
                'label'  => 'Password',
                'rules' => 'required'
            ]

        ])) {

            // $validation = \Config\Services::validation();

            // return redirect()->to('/product/create')->withInput()->with('validation', $validation);
            return redirect()->to('/auth')->withInput();
        }

        // KETIKA VALIDASI SUKSES
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $this->userModel->where(['email' => $email])->first();

        // user ada
        if ($user) {

            // jika user aktiv
            if ($user['is_active'] == 1) {

                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'image' => $user['image'],
                        'role_id' => $user['role_id']
                    ];

                    // $data = [
                    // 	'status' => 'berhasil',
                    // 	'user' => [
                    // 		'name' => $user['name'],
                    // 		'email' => $user['email'],
                    // 		'image' => $user['image'],
                    // 		'role_id' => $user['role_id']
                    // 	]
                    // ];

                    // return $json = json_encode($data);

                    session()->set($data);

                    return redirect()->to('/user');
                } else {
                    session()->setFlashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Worng password!');
                    return redirect()->to('/auth');
                }
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">This Email has not been activated!');

                return redirect()->to('/auth');
            }
        } else {

            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email is not registered!');

            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        session()->remove('email');
        session()->remove('role_id');
        session()->remove('image');
        session()->remove('name');

        session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">You have been logged out!');
        return redirect()->to('/auth');
    }

    //--------------------------------------------------------------------

}
