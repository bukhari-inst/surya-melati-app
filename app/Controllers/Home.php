<?php

namespace App\Controllers;

use App\Models\ModelPasien;
use App\Models\ModelCaraBayar;
use CodeIgniter\Exceptions\AlertError;

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

        // echo "<script> alert('There are no fields to generate a report'); </script>";

        return view('pages/users/pendaftaran', $data);
    }
}