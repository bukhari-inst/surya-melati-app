<?php

namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;
use App\Models\ModelPasien;
use App\Models\ModelPoliklinik;
use App\Models\ModelDokter;
use App\Models\ModelRegistrasiAntrianPasien;

/** 
 * @property IncomingRequest $request;
 */

class Users extends BaseController
{
    public function __construct()
    {
        $this->ModelPasien = new ModelPasien();
        $this->ModelPoliklinik = new ModelPoliklinik();
        $this->ModelDokter = new ModelDokter();
        $this->ModelRegistrasiAntrianPasien = new ModelRegistrasiAntrianPasien();
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
                return redirect()->to(site_url('/'));
            } else {
                return redirect()->back()->with('error', 'Tanggal lahir tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'Nomor rekam medik tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->remove('id_user');
        return redirect()->to(site_url('/login'));
    }

    public function getPoliklinik()
    {
        if ($this->request->isAJAX()) {
            $tanggal = $this->request->getVar('tanggal');
            $defineDate = date('D', strtotime($tanggal));
            $listDay = array(
                'Sun' => 'AKHAD',
                'Mon' => 'SENIN',
                'Tue' => 'SELASA',
                'Wed' => 'RABU',
                'Thu' => 'KAMIS',
                'Fri' => 'JUMAT',
                'Sat' => 'SABTU'
            );
            $day = $listDay[$defineDate];
            $poliklinik = $this->ModelPoliklinik->getPoliWhereDay($day);

            $valPoliklinik = "";

            foreach ($poliklinik as $poli) :
                $valPoliklinik .= '<option value="' . $poli->kd_poli . '">' . $poli->nm_poli . " " . $poli->jam_mulai . " - " . $poli->jam_selesai . '</option>';
            endforeach;

            $msg = [
                'data' => $valPoliklinik
            ];
            echo json_encode($msg);
        }
    }

    public function getDokter()
    {
        if ($this->request->isAJAX()) {
            $poliklinik = $this->request->getVar('poliklinik');

            $dokter = $this->ModelDokter->getDokterWherePoli($poliklinik);

            $valDokter = "";

            foreach ($dokter as $dok) :
                $valDokter .= '<option value="' . $dok->kd_dokter . '">' . $dok->nm_dokter . '</option>';
            endforeach;

            $msg = [
                'data' => $valDokter
            ];
            echo json_encode($msg);
        }
    }

    public function registrasiAntrian()
    {
        $this->ModelRegistrasiAntrianPasien->save([]);
    }
}