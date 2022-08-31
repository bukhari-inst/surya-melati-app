<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPasien extends Model
{
    protected $table = 'pasien_bayi';
    protected $primaryKey = 'no_rkm_medis';

    // protected $useTimestamps = false;
    // protected $useSoftDeletes = false;
    protected $returnType = 'object';

    protected $allowedFields = [
        'no_rkm_medis', 'umur_ibu'
    ];
}