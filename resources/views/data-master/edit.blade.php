@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-blue-900 text-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Edit Data Mahasiswa</h2>
    <form action="{{ route('data-master.update', $dataMahasiswa->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        @php
            function isSelected($value, $current) {
                return $value === $current ? 'selected' : '';
            }
        @endphp

        <!-- Tahun Akademik -->
        <div>
            <label for="tahun_akademik" class="block text-sm font-medium">Tahun Akademik</label>
            <select name="tahun_akademik" id="tahun_akademik" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                <option value="First year" {{ isSelected('First year', $dataMahasiswa->tahun_akademik) }}>Tahun Pertama</option>
                <option value="Second year" {{ isSelected('Second year', $dataMahasiswa->tahun_akademik) }}>Tahun Kedua</option>
                <option value="Third year" {{ isSelected('Third year', $dataMahasiswa->tahun_akademik) }}>Tahun Ketiga</option>
                <option value="Graduate student" {{ isSelected('Graduate student', $dataMahasiswa->tahun_akademik) }}>Mahasiswa Pascasarjana</option>
            </select>
        </div>

        <!-- Jenis Kelamin -->
        <div>
            <label for="jenis_kelamin" class="block text-sm font-medium">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                <option value="Male" {{ isSelected('Male', $dataMahasiswa->jenis_kelamin) }}>Laki-laki</option>
                <option value="Female" {{ isSelected('Female', $dataMahasiswa->jenis_kelamin) }}>Perempuan</option>
            </select>
        </div>

        <!-- Lama Tidur -->
        <div>
            <label for="lama_tidur" class="block text-sm font-medium">Lama Tidur</label>
            <select name="lama_tidur" id="lama_tidur" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                @foreach ([
                    'More than 8 hours' => 'Lebih dari 8 jam',
                    '7-8 hours' => '7-8 jam',
                    '6-7 hours' => '6-7 jam',
                    '5-6' => '5-6 jam',
                    '4-5 hours' => '4-5 jam',
                    'Less than 4 hours' => 'Kurang dari 4 jam',
                    'Less than 5' => 'Kurang dari 5 jam'
                ] as $value => $label)
                    <option value="{{ $value }}" {{ isSelected($value, $dataMahasiswa->lama_tidur) }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <!-- Kesulitan Konsentrasi -->
        <div>
            <label for="kesulitan_konsentrasi" class="block text-sm font-medium">Kesulitan Konsentrasi</label>
            <select name="kesulitan_konsentrasi" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                @foreach ([
                    'Never' => 'Tidak Pernah',
                    'Rarely' => 'Jarang',
                    'Sometimes' => 'Kadang-kadang',
                    'Often' => 'Sering',
                    'Always' => 'Selalu'
                ] as $value => $label)
                    <option value="{{ $value }}" {{ isSelected($value, $dataMahasiswa->kesulitan_konsentrasi) }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <!-- Ketidakhadiran Kuliah -->
        <div>
            <label for="ketidakhadiran_kuliah" class="block text-sm font-medium">Ketidakhadiran Kuliah</label>
            <select name="ketidakhadiran_kuliah" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                @foreach ([
                    'Never' => 'Tidak Pernah',
                    'Rarely (1-2 times a month)' => 'Jarang (1-2 kali/bulan)',
                    'Sometimes (1-2 times a week)' => 'Kadang-kadang (1-2 kali/minggu)',
                    'Often (3-4 times a week)' => 'Sering (3-4 kali/minggu)',
                    'Always' => 'Selalu'
                ] as $value => $label)
                    <option value="{{ $value }}" {{ isSelected($value, $dataMahasiswa->ketidakhadiran_kuliah) }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <!-- Penggunaan Perangkat -->
        <div>
            <label for="penggunaan_perangkat" class="block text-sm font-medium">Penggunaan Perangkat Sebelum Tidur</label>
            <select name="penggunaan_perangkat" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                @foreach ([
                    'Never' => 'Tidak Pernah',
                    'Rarely' => 'Jarang',
                    'Sometimes' => 'Kadang-kadang',
                    'Frequently' => 'Sering',
                    'Every night' => 'Setiap malam'
                ] as $value => $label)
                    <option value="{{ $value }}" {{ isSelected($value, $dataMahasiswa->penggunaan_perangkat) }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <!-- Konsumsi Kafein -->
        <div>
            <label for="konsumsi_kafein" class="block text-sm font-medium">Konsumsi Kafein</label>
            <select name="konsumsi_kafein" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                @foreach ([
                    'Never' => 'Tidak Pernah',
                    'Rarely (1-2 times a week)' => 'Jarang (1-2 kali/minggu)',
                    'Sometimes (3-4 times a week)' => 'Kadang-kadang (3-4 kali/minggu)',
                    'Often (5-6 times a week)' => 'Sering (5-6 kali/minggu)',
                    'Every day' => 'Setiap hari',
                    'Yes' => 'Ya',
                    'No' => 'Tidak'
                ] as $value => $label)
                    <option value="{{ $value }}" {{ isSelected($value, $dataMahasiswa->konsumsi_kafein) }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <!-- Aktivitas Olahraga -->
        <div>
            <label for="aktivitas_olahraga" class="block text-sm font-medium">Aktivitas Olahraga</label>
            <select name="aktivitas_olahraga" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                @foreach ([
                    'Never' => 'Tidak Pernah',
                    'Rarely (1-2 times a week)' => 'Jarang (1-2 kali/minggu)',
                    'Sometimes (3-4 times a week)' => 'Kadang-kadang (3-4 kali/minggu)',
                    'Often (5-6 times a week)' => 'Sering (5-6 kali/minggu)',
                    'Every day' => 'Setiap hari',
                    'Yes' => 'Ya',
                    'No' => 'Tidak'
                ] as $value => $label)
                    <option value="{{ $value }}" {{ isSelected($value, $dataMahasiswa->aktivitas_olahraga) }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tingkat Stres -->
        <div>
            <label for="tingkat_stres" class="block text-sm font-medium">Tingkat Stres</label>
            <select name="tingkat_stres" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                @foreach ([
                    'No stress' => 'Tidak Stres',
                    'Low stress' => 'Stres Rendah',
                    'Moderate' => 'Stres Sedang',
                    'High stress' => 'Stres Tinggi',
                    'Very High' => 'Sangat Tinggi',
                    'Extremely high stress' => 'Ekstrem'
                ] as $value => $label)
                    <option value="{{ $value }}" {{ isSelected($value, $dataMahasiswa->tingkat_stres) }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <!-- Performa Akademik -->
        <div>
            <label for="performa_akademik" class="block text-sm font-medium">Performa Akademik</label>
            <select name="performa_akademik" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                @foreach ([
                    'Excellent' => 'Sangat Baik',
                    'Good' => 'Baik',
                    'Average' => 'Cukup',
                    'Below Average' => 'Di Bawah Rata-rata',
                    'Poor' => 'Buruk'
                ] as $value => $label)
                    <option value="{{ $value }}" {{ isSelected($value, $dataMahasiswa->performa_akademik) }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <!-- Kategori Insomnia -->
        <div>
            <label for="kategori_insomnia" class="block text-sm font-medium">Kategori Insomnia</label>
            <select name="kategori_insomnia" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                <option value="0" {{ isSelected('0', $dataMahasiswa->kategori_insomnia) }}>Tidak Ada Insomnia</option>
                <option value="1" {{ isSelected('1', $dataMahasiswa->kategori_insomnia) }}>Insomnia Ringan</option>
                <option value="2" {{ isSelected('2', $dataMahasiswa->kategori_insomnia) }}>Insomnia Parah</option>
            </select>
        </div>

        <!-- Tombol -->
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
            Perbarui
        </button>
    </form>
</div>
@endsection
