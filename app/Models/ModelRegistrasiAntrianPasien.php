<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRegistrasiAntrianPasien extends Model
{
    protected $table = 'reg_periksa';
    protected $primaryKey = 'id';

    protected $returnType = 'object';

    protected $allowedFields = [
        'id', 'no_reg', 'no_rawat', 'tgl_registrasi', 'jam_reg', 'kd_dokter', 'no_rkm_medis', 'kd_poli', 'almt_pj', 'hubunganpj', 'biaya_reg', 'stts', 'stts_daftar', 'status_lanjut', 'kd_pj', 'umurdaftar', 'sttsumur', 'status_bayar'
    ];

    public function getLastNoRegWhereDokterAndTglReg($dokter = false, $tanggalRreg = false)
    {
        $query = $this->db->query("SELECT max(no_reg) as no_reg FROM reg_periksa WHERE kd_dokter='$dokter' AND tgl_registrasi='$tanggalRreg'");
        return $query->getRowObject();
    }

    public function getLastNoRawatWhereTglReg($tanggalRreg = false)
    {
        $query = $this->db->query("SELECT max(no_rawat) as no_rawat FROM reg_periksa WHERE tgl_registrasi='$tanggalRreg'");
        return $query->getRowObject();
    }
}