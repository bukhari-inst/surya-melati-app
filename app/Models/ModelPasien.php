<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPasien extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'no_rkm_medis';

    protected $returnType = 'object';

    protected $allowedFields = [
        'no_rkm_medis', 'nm_pasien', 'no_ktp', 'jk', 'agama',
        'tmp_lahir', 'tgl_lahir', 'nm_ibu', 'alamat',
        'gol_darah', 'pekerjaan', 'stts_nikah', 'no_tlp', 'no_peserta'
    ];

    public function getPasienWhereNoRkmMedis($noRkmMedis = false)
    {
        return $this->where(['no_rkm_medis' => $noRkmMedis])->first();
    }
}