<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPoliklinik extends Model
{
    protected $table = 'poliklinik';
    protected $primaryKey = 'kd_poli';

    protected $returnType = 'object';

    protected $allowedFields = [
        'nm_poli',
    ];

    public function getPoliWhereDay($day = false)
    {
        return $this->select('jdwl.kd_poli,poliklinik.nm_poli, DATE_FORMAT(jdwl.jam_mulai, "%h:%i %p") as jam_mulai, DATE_FORMAT(jdwl.jam_selesai, "%h:%i %p") as jam_selesai')
            ->join('jadwal jdwl', 'poliklinik.kd_poli = jdwl.kd_poli')
            ->join('dokter dktr', 'dktr.kd_dokter = jdwl.kd_dokter')
            ->where('jdwl.hari_kerja', $day)
            ->groupBy('poliklinik.kd_poli')
            ->findAll();
    }

    public function getPoliWhereKdpoli($kdPoli = false)
    {
        return $this->where(['kd_poli' => $kdPoli])->first();
    }
}