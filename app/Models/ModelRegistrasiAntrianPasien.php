<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRegistrasiAntrianPasien extends Model
{
    protected $table = 'reg_periksa';
    protected $primaryKey = 'no_rawat';

    protected $returnType = 'object';

    protected $allowedFields = [
        'no_rawat', 'no_reg', 'tgl_registrasi', 'jam_reg',
        'kd_dokter', 'no_rkm_medis', 'kd_poli', 'almt_pj',
        'hubunganpj', 'biaya_reg', 'stts', 'stts_daftar',
        'status_lanjut', 'kd_pj', 'umurdaftar', 'sttsumur', 'status_bayar'
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

    public function getLastAntrian($userId = false)
    {
        return $this->select('nm_pasien, reg_periksa.no_rkm_medis, tgl_registrasi, jam_reg, no_rawat, no_reg, nm_poli, nm_dokter, status_lanjut, png_jawab, status_bayar, DATE_FORMAT(jdwl.jam_mulai, "%h:%i %p") as jam_mulai, DATE_FORMAT(jdwl.jam_selesai, "%h:%i %p") as jam_selesai')
            ->join('poliklinik plk', 'reg_periksa.kd_poli = plk.kd_poli')
            ->join('jadwal jdwl', 'plk.kd_poli = jdwl.kd_poli')
            ->join('dokter dktr', 'dktr.kd_dokter = reg_periksa.kd_dokter')
            ->join('penjab pnj', 'pnj.kd_pj = reg_periksa.kd_pj')
            ->join('pasien psn', 'psn.no_rkm_medis = reg_periksa.no_rkm_medis')
            ->where('reg_periksa.no_rkm_medis', $userId)
            ->orderBy('reg_periksa.tgl_registrasi', 'DESC')
            ->first();
    }

    public function getLastAntrianSttsBelum($userId = false)
    {
        return $this->select('nm_pasien, reg_periksa.no_rkm_medis, tgl_registrasi, jam_reg, no_rawat, no_reg, nm_poli, nm_dokter, status_lanjut, png_jawab, status_bayar, DATE_FORMAT(jdwl.jam_mulai, "%h:%i %p") as jam_mulai, DATE_FORMAT(jdwl.jam_selesai, "%h:%i %p") as jam_selesai')
            ->join('poliklinik plk', 'reg_periksa.kd_poli = plk.kd_poli')
            ->join('jadwal jdwl', 'plk.kd_poli = jdwl.kd_poli')
            ->join('dokter dktr', 'dktr.kd_dokter = reg_periksa.kd_dokter')
            ->join('penjab pnj', 'pnj.kd_pj = reg_periksa.kd_pj')
            ->join('pasien psn', 'psn.no_rkm_medis = reg_periksa.no_rkm_medis')
            ->where('reg_periksa.no_rkm_medis', $userId)
            ->where('reg_periksa.stts', 'Belum')
            ->orderBy('reg_periksa.tgl_registrasi', 'DESC')
            ->first();
    }

    public function getHistoryAntrian($userId = false)
    {
        return $this->select('nm_pasien, reg_periksa.no_rkm_medis, tgl_registrasi, jam_reg, no_rawat, no_reg, nm_poli, nm_dokter, status_lanjut, png_jawab, status_bayar, DATE_FORMAT(jdwl.jam_mulai, "%h:%i %p") as jam_mulai, DATE_FORMAT(jdwl.jam_selesai, "%h:%i %p") as jam_selesai')
            ->join('poliklinik plk', 'reg_periksa.kd_poli = plk.kd_poli')
            ->join('jadwal jdwl', 'plk.kd_poli = jdwl.kd_poli')
            ->join('dokter dktr', 'dktr.kd_dokter = reg_periksa.kd_dokter')
            ->join('penjab pnj', 'pnj.kd_pj = reg_periksa.kd_pj')
            ->join('pasien psn', 'psn.no_rkm_medis = reg_periksa.no_rkm_medis')
            ->where('reg_periksa.no_rkm_medis', $userId)
            ->orderBy('reg_periksa.tgl_registrasi', 'DESC')
            ->findAll();
    }
}