<?php

namespace App\Controllers;

// use App\Models\ModelPasien;

class Home extends BaseController
{
    public function __construct()
    {
        // $this->ModelPasien = new ModelPasien();
    }

    public function index()
    {
        // $pasien = $this->ModelPasien->findAll();
        // dd($pasien);

        $data = [];

        return view('pages/index');
    }
}