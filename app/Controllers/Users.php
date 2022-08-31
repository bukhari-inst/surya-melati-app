<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function __construct()
    {
    }

    public function login()
    {
        $data = [];

        return view('pages/auth/login');
    }
}