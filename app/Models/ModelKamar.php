<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDokter extends Model
{
    protected $table = 'bangsal';
    protected $primaryKey = 'kd_bangsal';

    protected $returnType = 'object';

    protected $allowedFields = [
        'kd_bangsal',
    ];

    public function getInfoKamar()
    {
        return $this->select('kd_bangsal')
            ->join('kamar kmr', 'bangsal.kd_bangsal = kmr.kd_bangsal')
            ->countAllResults();
    }
}