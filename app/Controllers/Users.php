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
    protected $ModelPoliklinik,
        $ModelPasien,
        $ModelRegistrasiAntrianPasien,
        $ModelDokter;

    public function __construct()
    {
        $this->ModelPoliklinik = new ModelPoliklinik();
        $this->ModelPasien = new ModelPasien();
        $this->ModelDokter = new ModelDokter();
        $this->ModelRegistrasiAntrianPasien = new ModelRegistrasiAntrianPasien();
        $this->today = date('Y-m-d');
    }

    public function login()
    {
        if (session('user_id')) {
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
                $params = [
                    'user_id' => $user->no_rkm_medis,
                    'username' => $user->nm_pasien,
                ];
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
        session()->remove('user_id', 'username');
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
        $today = strtotime($this->today);
        $tanggalKunjungan = $this->request->getVar('tanggalkunjungan');
        $valTanggalKunjungan = strtotime($tanggalKunjungan);
        $lastAntrian = $this->ModelRegistrasiAntrianPasien->getLastAntrian(session('user_id'));
        $lastTglAntrian = strtotime($lastAntrian->tgl_registrasi);

        // dd($lastAntrian->status_bayar);
        if ($lastAntrian->status_bayar != 'Belum Bayar') {
            if ($valTanggalKunjungan != $today && $valTanggalKunjungan > $today) {
                if ($valTanggalKunjungan != $lastTglAntrian) {
                    if (!$this->validate([
                        'norekammedik' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Nomor rekam medik tidak boleh kosong',
                            ]
                        ],
                        'tanggalkunjungan' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Tanggal kunjungan tidak boleh kosong',
                            ]
                        ],
                        'poliklinik' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Poliklinik tidak boleh kosong',
                            ]
                        ],
                        'pilihdokter' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Dokter tidak boleh kosong',
                            ]
                        ],
                        'payment' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'payment tidak boleh kosong',
                            ]
                        ]
                    ])) {
                        return redirect()->back()->withInput();
                    }

                    $noRekamMedik = $this->request->getVar('norekammedik');
                    $tanggalreg = date('Y/m/d', strtotime($tanggalKunjungan));
                    $poliklinik = $this->request->getVar('poliklinik');
                    $pilihDokter = $this->request->getVar('pilihdokter');
                    $payment = $this->request->getVar('payment');

                    // dd($noRekamMedik, $tanggalKunjungan, $tanggalreg, $poliklinik, $pilihDokter, $payment);

                    $valNoReg = '';
                    $noRegAkhir = $this->ModelRegistrasiAntrianPasien->getLastNoRegWhereDokterAndTglReg($pilihDokter, $tanggalKunjungan);

                    if ($noRegAkhir->no_reg != null) {
                        $no_urut_reg = substr($noRegAkhir->no_reg, 0, 3);
                        $valNoReg = sprintf('%03s', ($no_urut_reg + 1));
                    } else {
                        $valNoReg = '001';
                    }

                    $valNoRawat = '';
                    $noRawatAkhir = $this->ModelRegistrasiAntrianPasien->getLastNoRawatWhereTglReg($tanggalKunjungan);

                    if ($noRawatAkhir->no_rawat != null) {
                        $no_urut_rawat = substr($noRawatAkhir->no_rawat, 11, 6);
                        $valNoRawat = $tanggalreg . '/' . sprintf('%06s', ($no_urut_rawat + 1));
                    } else {
                        $valNoRawat = $tanggalreg . '/' . '000001';
                    }

                    $nmKeluarga = $this->ModelPasien->getPasienWhereNoRkmMedis($noRekamMedik);
                    $biayaReg = $this->ModelPoliklinik->getPoliWhereKdpoli($poliklinik);

                    //menentukan umur sekarang
                    list($cY, $cm, $cd) = explode('-', date('Y-m-d'));
                    list($Y, $m, $d) = explode('-', date('Y-m-d', strtotime($nmKeluarga->tgl_lahir)));
                    $umurdaftar = $cY - $Y;

                    $this->ModelRegistrasiAntrianPasien->save([
                        'no_rawat' => $valNoRawat,
                        'no_reg' => $valNoReg,
                        'tgl_registrasi' => $tanggalKunjungan,
                        'jam_reg' => date('H:i:s'),
                        'kd_dokter' => $pilihDokter,
                        'no_rkm_medis' => $noRekamMedik,
                        'kd_poli' => $poliklinik,
                        'p_jawab' => $nmKeluarga->namakeluarga,
                        'almt_pj' => $nmKeluarga->alamat,
                        'hubunganpj' => $nmKeluarga->keluarga,
                        'biaya_reg' => $biayaReg->registrasilama,
                        'stts' => 'Belum',
                        'stts_daftar' => 'Lama',
                        'status_lanjut' => 'Ralan',
                        'kd_pj' => $payment,
                        'umurdaftar' => $umurdaftar,
                        'sttsumur' => 'Th',
                        'status_bayar' => 'Belum Bayar',
                    ]);

                    session()->setFlashdata('success', 'Berhasil daftar antrian.');
                    return redirect()->to('/antrianSekarang')->withInput();
                } else {
                    return redirect()->back()->with('error', 'Anda sudah daftar antrian pada tanggal ' . date_format(date_create($tanggalKunjungan), 'd-M-Y') . '.');
                }
            } else {
                return redirect()->back()->with('error', 'Pendaftaran antrian online harus 1 hari / lebih sebelum periksa.');
            }
        } else {
            return redirect()->back()->with('error', 'Gagal daftar antrian | B001. Silahkan hubungi kontak yang tersedia!');
        }
    }

    public function antrianSekarang()
    {
        $today = strtotime($this->today);
        $lastAntrian = $this->ModelRegistrasiAntrianPasien->getLastAntrianSttsBelum(session('user_id'));

        $data = [
            'user' => session('username'),
            'today' => $today,
            'lastAntrian' => $lastAntrian
        ];
        // dd($data);

        return view('pages/users/antrian_sekarang', $data);
    }

    public function gantiTanggalAntrian()
    {
        $lastAntrian = $this->ModelRegistrasiAntrianPasien->getLastAntrian(session('user_id'));

        if (time() < strtotime('12:01 am ' . date($lastAntrian->tgl_registrasi))) {
            $this->ModelRegistrasiAntrianPasien->save([
                'no_rawat' => $lastAntrian->no_rawat,
                'stts' => 'Batal',
            ]);

            return redirect()->to('/')->with('success', 'Antrian anda sebelumnya berhasil dibatalkan, Silahkan daftar antrian kembali.');
        } else {
            return redirect()->to('/')->with('error', 'Gagal ganti tanggal antrian! anda sudah melebihi batas waktu. Atau batalkan antrian anda sekarang, dan daftar antrian kembali selain tanggal besok.');
        }
    }

    public function batalTanggalAntrian()
    {
        $lastAntrian = $this->ModelRegistrasiAntrianPasien->getLastAntrian(session('user_id'));
        $this->ModelRegistrasiAntrianPasien->save([
            'no_rawat' => $lastAntrian->no_rawat,
            'stts' => 'Batal',
        ]);

        return redirect()->to('/')->with('success', 'Antrian anda berhasil dibatalkan.');
    }

    public function riwayatPeriksa()
    {

        $historyAntrian = $this->ModelRegistrasiAntrianPasien->getHistoryAntrian(session('user_id'));

        $data = [
            'user' => session('username'),
            'historyAntrian' => $historyAntrian,
        ];

        return view('pages/users/riwayat_periksa', $data);
    }
}