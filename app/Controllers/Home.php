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
        $userId = session('id_user');
        $user = $this->ModelPasien->getPasienWhereNoRkmMedis($userId);
        $payment = $this->ModelCaraBayar->getSpecificPay();

        $data = [
            'user' => $user,
            'payment' => $payment,
        ];

        return view('pages/users/pendaftaran', $data);
    }
}