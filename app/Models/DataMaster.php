<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMaster extends Model
{
    use HasFactory;

protected $fillable = [
    'tahun_akademik',
    'jenis_kelamin',
    'lama_tidur',
    'kesulitan_konsentrasi',
    'ketidakhadiran_kuliah',
    'penggunaan_perangkat',
    'konsumsi_kafein',
    'aktivitas_olahraga',
    'tingkat_stress',
    'performa_akademik',
    'kategori_insomnia',
];
}
