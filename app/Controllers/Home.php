<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('layout/index');
    
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

        // dd ($loggedInUserId);
        return view('content/default-member', [
            'loggedInUserId' => $loggedInUserId,
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
