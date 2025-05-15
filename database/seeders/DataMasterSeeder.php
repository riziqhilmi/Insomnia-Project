<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataMahasiswa;
use Illuminate\Support\Facades\Storage;

class DataMasterSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/public/dataset_gabungan.csv');
        $data = array_map('str_getcsv', file($path));
        $header = array_map('trim', $data[0]);
        unset($data[0]);

        foreach ($data as $row) {
            $row = array_map('trim', $row);
            $record = array_combine($header, $row);

            // Mapping manual dari nama kolom CSV ke nama field database
            DataMahasiswa::create([
                'tahun_akademik'           => $record['year'] ?? '',
                'jenis_kelamin'            => $record['gender'] ?? '',
                'lama_tidur'               => $record['sleep_hours'] ?? '',
                'kesulitan_konsentrasi'    => $record['concentration'] ?? '',
                'ketidakhadiran_kuliah'    => $record['miss_class'] ?? '',
                'penggunaan_perangkat'     => $record['device_use'] ?? '',
                'konsumsi_kafein'          => $record['caffeine'] ?? '',
                'aktivitas_olahraga'       => $record['exercise'] ?? '',
                'tingkat_stres'            => $record['stress'] ?? '',
                'performa_akademik'        => $record['performance'] ?? '',
                'kategori_insomnia'        => $record['insomnia'] ?? '',
            ]);
        }
    }
}
