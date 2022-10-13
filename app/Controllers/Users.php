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

    public function routePrivateAccess()
    {
        if (session('user_id')) {
            return redirect()->to(site_url('/'));
        }

        return view('pages/auth/loginPrivateAccess');
    }

    public function loginProcess()
    {
        if (!$this->validate([
            'noRkmMedis' => [
                'rules' => 'required|alpha_numeric_punct|min_length[6]|max_length[6]',
                'errors' => [
                    'required' => 'No Rekam Medis lengkap tidak boleh kosong',
                    'min_length' => 'Nomor rekam medis tidak boleh kurang dari 6 digit',
                    'max_length' => 'Nomor rekam medis tidak boleh lebih dari 6 digit',
                ]
            ],
            'date' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'No Rekam Medis lengkap tidak boleh kosong',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

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
                // dd('test');
                return redirect()->to(base_url('/'));
            } else {
                return redirect()->back()->with('error', 'Tanggal lahir tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'Nomor rekam medik tidak ditemukan');
        }
    }

    public function loginPrivateAccessProcess()
    {
        if (!$this->validate([
            'noRkmMedis' => [
                'rules' => 'required|alpha_numeric_punct|min_length[3]|max_length[10]',
                'errors' => [
                    'required' => 'No Rekam Medis tidak boleh kosong',
                    'min_length' => 'Nomor rekam medis tidak boleh kurang dari 6 digit',
                    'max_length' => 'Nomor rekam medis tidak boleh lebih dari 6 digit',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $noRkmMedis = $this->request->getPost('noRkmMedis');
        $user = $this->ModelPasien->getPasienWhereNoRkmMedis($noRkmMedis);

        if ($user) {
            if ($noRkmMedis == $user->no_rkm_medis) {
                $params = [
                    'user_id' => $user->no_rkm_medis,
                    'username' => $user->nm_pasien,
                ];
                session()->set($params);
                return redirect()->to(site_url('/'));
            } else {
                return redirect()->back()->with('error', 'Nomor rekam medik tidak ditemukan');
            }
        } else {
            return redirect()->back()->with('error', 'Nomor rekam medik tidak ditemukan');
        }
    }


    public function logout()
    {
        session()->remove('user_id');
        session()->remove('username');
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

        // dd($lastAntrian);
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

                    $this->ModelRegistrasiAntrianPasien->insert([
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

    public function informasiKamar()
    {
        $data = [
            'user' => session('username'),
        ];

        return view('pages/users/informasi_kamar', $data);
    }

    public function perbaruiDataUser()
    {
        $pekerjaan = [
            'BELUM/TIDAK BEKERJA', 'MENGURUS RUMAH TANGGA',
            'PELAJAR/MAHASISWA', 'PENSIUNAN', 'PEGAWAI NEGERI SIPIL',
            'TENTARA NASIONAL INDONESIA', 'KEPOLISIAN RI', 'PERDAGANGAN',
            'PETANI/PEKEBUN', 'PETERNAK', 'NELAYAN/PERIKANAN', 'INDUSTRI',
            'KONSTRUKSI', 'TRANSPORTASI', 'KARYAWAN SWASTA', 'KARYAWAN BUMN',
            'KARYAWAN BUMD', 'KARYAWAN HONORER', 'BURUH HARIAN LEPAS',
            'BURUH TANI/PERKEBUNAN', 'BURUH NELAYAN/PERIKANAN', 'BURUH PETERNAKAN',
            'PEMBANTU RUMAH TANGGA', 'TUKANG CUKUR', 'TUKANG LISTRIK', 'TUKANG BATU',
            'TUKANG KAYU', 'TUKANG SOL SEPATU', 'TUKANG LAS/PANDAI BESI', 'TUKANG JAHIT',
            'TUKANG GIGI', 'PENATA RIAS', 'PENATA BUSANA', 'PENATA RAMBUT', 'MEKANIK',
            'SENIMAN', 'TABIB', 'PARAJI', 'PERANCANG BUSANA', 'PENTERJEMAH',
            'IMAM MASJID', 'PENDETA', 'PASTOR', 'WARTAWAN', 'USTADZ/MUBALIGH',
            'JURU MASAK', 'PROMOTOR ACARA', 'ANGGOTA DPR-RI', 'ANGGOTA DPD',
            'ANGGOTA BPK', 'PRESIDEN', 'WAKIL PRESIDEN', 'ANGGOTA MAHKAMAH KONSTITUSI',
            'ANGGOTA KABINET/KEMENTRIAN', 'DUTA BESAR', 'GUBERNUR', 'WAKIL GUBERNUR',
            'BUPATI', 'WAKIL BUPATI', 'WALI KOTA', 'WAKIL WALIKOTA',
            'ANGGOTA DPRD PROVINSI', 'ANGGOTA DPRD KABUPATEN/KOTA',
            'DOSEN', 'GURU', 'PILOT', 'PENGACARA', 'NOTARIS', 'ARSITEK', 'AKUNTAN',
            'KONSULTAN', 'KONSULTAN', 'DOKTER', 'BIDAN', 'PERAWAT', 'APOTEKER',
            'PSIKIATER/PSIKOLOG', 'PENYIAR TELEVISI', 'PENYIAR RADIO', 'PELAUT',
            'PENELITI', 'SOPIR', 'PIALANG', 'PARANORMAL', 'PEDAGANG', 'PERANGKAT DESA',
            'KEPALA DESA', 'BIARAWATI', 'WIRASWASTA', 'LAINNYA'
        ];
        $pasien = $this->ModelPasien->getPasienWhereNoRkmMedis(session('user_id'));

        $data = [
            'validation' => \Config\Services::validation(),
            'user' => session('username'),
            'pasien' => $pasien,
            'pekerjaan' => $pekerjaan,
        ];

        return view('pages/users/perbarui_data_user', $data);
    }

    public function updateDataUser()
    {
        $namaPasien = $this->request->getVar('namaPasien');
        $nikKtp = $this->request->getVar('nikKtp');
        $noPeserta = $this->request->getVar('noPeserta');
        $jenisKelamin = $this->request->getVar('jenisKelamin');
        $agama = $this->request->getVar('agama');
        $tempatLahir = $this->request->getVar('tempatLahir');
        $valtglLahir = $this->request->getVar('tglLahir');
        $tglLahir = date_format(date_create($valtglLahir), 'Y-m-d');
        $namaIbu = $this->request->getVar('namaIbu');
        $alamat = $this->request->getVar('alamat');
        $golonganDarah = $this->request->getVar('golonganDarah');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $statusNikah = $this->request->getVar('statusNikah');
        $nomorTelepon = $this->request->getVar('nomorTelepon');
        $pasien = $this->ModelPasien->getPasienWhereNoRkmMedis(session('user_id'));

        if ($namaPasien != $pasien->nm_pasien) {
            if (!$this->validate([
                'namaPasien' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama lengkap tidak boleh kosong',
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
            }
        }

        if ($nikKtp != $pasien->no_ktp) {
            if (!$this->validate([
                'nikKtp' => [
                    'rules' => 'required|min_length[16]|max_length[16]',
                    'errors' => [
                        'required' => 'NIK KTP tidak boleh kosong',
                        'min_length' => 'NIK KTP tidak boleh kurang dari 16 digit',
                        'max_length' => 'NIK KTP tidak boleh lebih dari 16 digit',
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
            }
        }

        if ($noPeserta != $pasien->no_peserta) {
            if (!$this->validate([
                'noPeserta' => [
                    'rules' => 'required|min_length[13]|max_length[13]',
                    'errors' => [
                        'required' => 'No. Kartu BPJS tidak boleh kosong',
                        'min_length' => 'No. Kartu BPJS tidak boleh kurang dari 13 digit',
                        'max_length' => 'No. Kartu BPJS tidak boleh lebih dari 13 digit',
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
            }
        }

        if ($jenisKelamin != $pasien->jk) {
            if (!$this->validate([
                'jenisKelamin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kelamin tidak boleh kosong',
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
            }
        }

        if ($agama != $pasien->agama) {
            if (!$this->validate([
                'agama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Agama tidak boleh kosong',
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
            }
        }

        if ($tempatLahir != $pasien->tmp_lahir) {
            if (!$this->validate([
                'tempatLahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tempat lahir tidak boleh kosong',
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
            }
        }

        if ($tglLahir != $pasien->tgl_lahir) {
            if (!$this->validate([
                'tglLahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal lahir tidak boleh kosong',
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
            }
        }

        if ($namaIbu != $pasien->nm_ibu) {
            if (!$this->validate([
                'namaIbu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama ibu tidak boleh kosong',
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
            }
        }

        if ($alamat != $pasien->alamat) {
            if (!$this->validate([
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat tidak boleh kosong',
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
            }
        }

        if ($golonganDarah != $pasien->gol_darah) {
            if (!$this->validate([
                'golonganDarah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Golongan darah tidak boleh kosong',
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
            }
        }

        if ($pekerjaan != $pasien->pekerjaan) {
            if (!$this->validate([
                'pekerjaan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pekerjaan tidak boleh kosong',
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
            }
        }

        if ($statusNikah != $pasien->stts_nikah) {
            if (!$this->validate([
                'statusNikah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status nikah tidak boleh kosong',
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
            }
        }

        if ($nomorTelepon != $pasien->no_tlp) {
            if (!$this->validate([
                'nomorTelepon' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor telepon tidak boleh kosong',
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
            }
        }

        $this->ModelPasien->save([
            'no_rkm_medis' => session('user_id'),
            'nm_pasien' => $namaPasien,
            'no_ktp' => $nikKtp,
            'jk' => $jenisKelamin,
            'agama' => $agama,
            'tmp_lahir' => $tempatLahir,
            'tgl_lahir' => $tglLahir,
            'nm_ibu' => $namaIbu,
            'alamat' => $alamat,
            'gol_darah' => $golonganDarah,
            'pekerjaan' => $pekerjaan,
            'stts_nikah' => $statusNikah,
            'no_tlp' => $nomorTelepon,
            'no_peserta' => $noPeserta,
        ]);

        return redirect()->to('/perbaruiDataUser')->with('success', 'Data diri anda berhasil diperbarui.');
    }
}
