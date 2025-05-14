<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'data_mahasiswa';

    // Izinkan field-field ini untuk mass assignment
    protected $fillable = [
        'tahun_akademik',
        'jenis_kelamin',
        'lama_tidur',
        'kesulitan_konsentrasi',
        'ketidakhadiran_kuliah',
        'penggunaan_perangkat',
        'konsumsi_kafein',
        'aktivitas_olahraga',
        'tingkat_stres',
        'performa_akademik',
        'kategori_insomnia',
    ];

    public function getRouteKeyName(){
    return 'id'; // atau kunci primary lain jika bukan 'id'
}

}
