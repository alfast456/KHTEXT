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
}
