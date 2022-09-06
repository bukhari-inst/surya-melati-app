<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRegistrasiAntrianPasien extends Model
{
    protected $table = 'reg_periksa';
    protected $primaryKey = 'no_rawat';

    protected $returnType = 'object';

    protected $allowedFields = [
        'no_reg', 'no_rawat ', 'tgl_registrasi', 'jam_reg', 'kd_dokter', 'no_rkm_medis', 'kd_poli', 'almt_pj', 'hubunganpj',
        'biaya_reg', 'stts', 'stts_daftar', 'status_lanjut', 'kd_pj', 'umurdaftar', 'sttsumur', 'status_bayar',
    ];

    public function getLastNoRegWhereDokterAndTglReg($dokter = false, $tanggalRreg = false)
    {
        return $this->selectMax('no_reg')
            ->where('kd_dokter', $dokter)
            ->where('tgl_registrasi', $tanggalRreg)
            ->first();
    }
}