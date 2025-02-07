<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
class Home extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $loggedInUserId = session()->get('id'); // Pastikan Anda memiliki session user ID

        return view('layout/index', [
            'loggedInUserId' => $loggedInUserId,
        ]);
    
    }

    public function email()
    {
        $loggedInUserId = session()->get('id'); // Pastikan Anda memiliki session user ID

        // dd ($loggedInUserId);

        return view('content/default-email-box', [
            'loggedInUserId' => $loggedInUserId,
        ]);
    }

    public function login(): string
    {
        return view('content/login');
    }

    public function contact()
    {
        $loggedInUserId = session()->get('id'); // Pastikan Anda memiliki session user ID

        $contactList = $this->userModel->findAll();
        // dd ($loggedInUserId);
        return view('content/default-member', [
            'loggedInUserId' => $loggedInUserId,
            'contactList' => $contactList,
        ]);
    }

    public function message()
    {
        $loggedInUserId = session()->get('id'); // Pastikan Anda memiliki session user ID

        return view('content/message', [
            'loggedInUserId' => $loggedInUserId,
        ]);
    }

    public function notification(): string
    {
        return view('content/default-notification');
    }
}
