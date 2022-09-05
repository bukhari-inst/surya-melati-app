<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCaraBayar extends Model
{
    protected $table = 'penjab';
    protected $primaryKey = 'kd_pj';

    protected $returnType = 'object';

    protected $allowedFields = [
        'png_jawab',
    ];

    public function getSpecificPay()
    {
        return $this->select('kd_pj, png_jawab')
            ->like('png_jawab', 'BPJS')
            ->orLike('png_jawab', 'BPJS KETENAGAKERJAAN')
            ->orLike('png_jawab', 'JASA RAHARJA')
            ->orLike('png_jawab', 'HALODOC')
            ->findAll();
    }
}