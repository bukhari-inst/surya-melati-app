<?php

namespace App\Controllers;

use App\Models\ModelPasien;
use App\Models\ModelCaraBayar;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelPasien = new ModelPasien();
        $this->ModelCaraBayar = new ModelCaraBayar();
    }

    public function index()
    {
        $payment = $this->ModelCaraBayar->getSpecificPay();

        $data = [
            'validation' => \Config\Services::validation(),
            'user' => session('username'),
            'user_id' => session('user_id'),
            'payment' => $payment,
        ];

        return view('pages/users/pendaftaran', $data);
    }
}
