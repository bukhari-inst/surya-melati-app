<?php

namespace App\Controllers;

use App\Models\ModelPasien;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelPasien = new ModelPasien();
    }

    public function index()
    {
        $userId = session('id_user');
        $user = $this->ModelPasien->getPasienWhereNoRkmMedis($userId);

        $data = [
            'user' => $user,
        ];

        return view('pages/users/pendaftaran', $data);
    }
}