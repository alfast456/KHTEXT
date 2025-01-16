<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RequestInterface;
use Config\Services;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $active;
    protected $request;
    protected $response;
    protected $session;
    protected $userModel;

    public function __construct()
    {
        $this->active = 1;
        $this->request = Services::request();
        $this->response = Services::response();
        $this->session = Services::session();
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $data = [
            'title' => 'Login',
        ];

        return view('content/login', $data);
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $model->where('email', $email)->first();
        // dd ($user);
        if ($user) {
            if ($password == $user['password']) {
                $session->set([
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Email tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
