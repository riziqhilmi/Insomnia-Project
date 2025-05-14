@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-blue-900 text-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Tambah Data Mahasiswa</h2>
    <form action="{{ route('data-master.store') }}" method="POST" class="space-y-6">
        @csrf
        @foreach ([
            'tahun_akademik' => 'Tahun Akademik',
            'jenis_kelamin' => 'Jenis Kelamin',
            'lama_tidur' => 'Lama Tidur',
            'kesulitan_konsentrasi' => 'Kesulitan Konsentrasi',
            'ketidakhadiran_kuliah' => 'Ketidakhadiran Kuliah',
            'penggunaan_perangkat' => 'Penggunaan Perangkat Sebelum Tidur',
            'konsumsi_kafein' => 'Konsumsi Kafein',
            'aktivitas_olahraga' => 'Aktivitas Olahraga',
            'tingkat_stres' => 'Tingkat Stres',
            'performa_akademik' => 'Performa Akademik',
            'kategori_insomnia' => 'Kategori Insomnia'
        ] as $field => $label)
            <div>
                <label for="{{ $field }}" class="block text-sm font-medium">{{ $label }}</label>
                <input type="text" name="{{ $field }}" id="{{ $field }}" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white focus:ring focus:ring-blue-300" required>
            </div>
        @endforeach
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
            Simpan
        </button>
    </form>
</div>
@endsection
