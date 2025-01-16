<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('layout/index');
    
    }

    public function email(): string
    {
        return view('content/default-email-box');
    }

    public function login(): string
    {
        return view('content/login');
    }

    public function contact(): string
    {
        return view('content/default-member');
    }

    public function message(): string
    {
        return view('content/message');
    }

    public function notification(): string
    {
        return view('content/default-notification');
    }
}
