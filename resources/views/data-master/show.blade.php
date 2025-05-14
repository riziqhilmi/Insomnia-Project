@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-blue-900 text-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Detail Data Mahasiswa</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ([
            'Tahun Akademik' => $dataMahasiswa->tahun_akademik,
            'Jenis Kelamin' => $dataMahasiswa->jenis_kelamin,
            'Lama Tidur' => $dataMahasiswa->lama_tidur,
            'Kesulitan Konsentrasi' => $dataMahasiswa->kesulitan_konsentrasi,
            'Ketidakhadiran Kuliah' => $dataMahasiswa->ketidakhadiran_kuliah,
            'Penggunaan Perangkat' => $dataMahasiswa->penggunaan_perangkat,
            'Konsumsi Kafein' => $dataMahasiswa->konsumsi_kafein,
            'Aktivitas Olahraga' => $dataMahasiswa->aktivitas_olahraga,
            'Tingkat Stres' => $dataMahasiswa->tingkat_stres,
            'Performa Akademik' => $dataMahasiswa->performa_akademik,
            'Kategori Insomnia' => $dataMahasiswa->kategori_insomnia
        ] as $label => $value)
            <div>
                <span class="font-semibold">{{ $label }}:</span>
                <div class="mt-1 bg-blue-800 p-3 rounded-md border border-blue-700">{{ $value }}</div>
            </div>
        @endforeach
    </div>

    <div class="mt-6 flex gap-4">
        <a href="{{ route('data-master.edit', $dataMahasiswa->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
            Edit
        </a>
        <a href="{{ route('data-master.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md">
            Kembali
        </a>
    </div>
</div>
@endsection
