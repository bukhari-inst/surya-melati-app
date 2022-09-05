<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'kd_dokter';

    protected $returnType = 'object';

    protected $allowedFields = [
        'nm_dokter',
    ];

    public function getDokterWherePoli($poli = false)
    {
        return $this->select('jdwl.kd_dokter, dktr.nm_dokter')
            ->join('jadwal jdwl', 'dokter.kd_dokter = jdwl.kd_dokter')
            ->join('dokter dktr', 'dktr.kd_dokter = jdwl.kd_dokter')
            ->where('jdwl.kd_poli', $poli)
            ->groupBy('dktr.nm_dokter')
            ->findAll();
    }
}