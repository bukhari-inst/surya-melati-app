<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPasien extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'no_rkm_medis';

    protected $returnType = 'object';

    protected $allowedFields = [
        'no_rkm_medis', 'tgl_lahir'
    ];

    public function getPasienWhereNoRkmMedis($noRkmMedis = false)
    {
        return $this->where(['no_rkm_medis' => $noRkmMedis])->first();
    }
}