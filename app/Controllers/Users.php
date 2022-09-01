<?php

namespace App\Controllers;

use App\Models\ModelPasien;

class Users extends BaseController
{
    public function __construct()
    {
        $this->ModelPasien = new ModelPasien();
    }

    public function login()
    {
        if (session('id_user')) {
            return redirect()->to(site_url('/'));
        }

        return view('pages/auth/login');
    }

    public function loginProcess()
    {
        $noRkmMedis = $this->request->getPost('noRkmMedis');
        $date = $this->request->getVar('date');
        $user = $this->ModelPasien->getPasienWhereNoRkmMedis($noRkmMedis);

        if ($user) {
            if ($date == $user->tgl_lahir) {
                $params = ['id_user' => $user->no_rkm_medis];
                session()->set($params);
                return redirect()->to(site_url('/pendaftaran'));
            } else {
                return redirect()->back()->with('error', 'Tanggal lahir tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'Nomor rekam medik tidak ditemukan');
        }
    }

    public function pendaftaran()
    {
        return view('pages/users/index');
    }
}