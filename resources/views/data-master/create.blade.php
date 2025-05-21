@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-blue-900 text-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Tambah Data Mahasiswa</h2>
    <form action="{{ route('data-master.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Tahun Akademik -->
            <div>
                <label for="tahun_akademik" class="block text-sm font-medium">Tahun Akademik</label>
                <select name="tahun_akademik" id="tahun_akademik" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                    <option value="First year">Tahun Pertama</option>
                    <option value="Second year">Tahun Kedua</option>
                    <option value="Third year">Tahun Ketiga</option>
                    <option value="Graduate student">Mahasiswa Pascasarjana</option>
                </select>
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                    <option value="Male">Laki-laki</option>
                    <option value="Female">Perempuan</option>
                </select>
            </div>

            <!-- Lama Tidur -->
            <div>
                <label for="lama_tidur" class="block text-sm font-medium">Lama Tidur</label>
                <select name="lama_tidur" id="lama_tidur" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                    <option value="More than 8 hours">Lebih dari 8 jam</option>
                    <option value="7-8 hours">7-8 jam</option>
                    <option value="6-7 hours">6-7 jam</option>
                    <option value="5-6">5-6 jam</option>
                    <option value="4-5 hours">4-5 jam</option>
                    <option value="Less than 4 hours">Kurang dari 4 jam</option>
                    <option value="Less than 5">Kurang dari 5 jam</option>
                </select>
            </div>

            <!-- Kesulitan Konsentrasi -->
            <div>
                <label for="kesulitan_konsentrasi" class="block text-sm font-medium">Kesulitan Konsentrasi</label>
                <select name="kesulitan_konsentrasi" id="kesulitan_konsentrasi" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                    <option value="Never">Tidak Pernah</option>
                    <option value="Rarely">Jarang</option>
                    <option value="Sometimes">Kadang-kadang</option>
                    <option value="Often">Sering</option>
                    <option value="Always">Selalu</option>
                </select>
            </div>

            <!-- Ketidakhadiran Kuliah -->
            <div>
                <label for="ketidakhadiran_kuliah" class="block text-sm font-medium">Ketidakhadiran Kuliah</label>
                <select name="ketidakhadiran_kuliah" id="ketidakhadiran_kuliah" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                    <option value="Never">Tidak Pernah</option>
                    <option value="Rarely (1-2 times a month)">Jarang (1-2 kali/bulan)</option>
                    <option value="Sometimes (1-2 times a week)">Kadang-kadang (1-2 kali/minggu)</option>
                    <option value="Often (3-4 times a week)">Sering (3-4 kali/minggu)</option>
                    <option value="Always">Selalu</option>
                </select>
            </div>

            <!-- Penggunaan Perangkat -->
            <div>
                <label for="penggunaan_perangkat" class="block text-sm font-medium">Penggunaan Perangkat Sebelum Tidur</label>
                <select name="penggunaan_perangkat" id="penggunaan_perangkat" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                    <option value="Never">Tidak Pernah</option>
                    <option value="Rarely">Jarang</option>
                    <option value="Sometimes">Kadang-kadang</option>
                    <option value="Frequently">Sering</option>
                    <option value="Every night">Setiap malam</option>
                </select>
            </div>

            <!-- Konsumsi Kafein -->
            <div>
                <label for="konsumsi_kafein" class="block text-sm font-medium">Konsumsi Kafein</label>
                <select name="konsumsi_kafein" id="konsumsi_kafein" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                    <option value="Never">Tidak Pernah</option>
                    <option value="Rarely (1-2 times a week)">Jarang (1-2 kali/minggu)</option>
                    <option value="Sometimes (3-4 times a week)">Kadang-kadang (3-4 kali/minggu)</option>
                    <option value="Often (5-6 times a week)">Sering (5-6 kali/minggu)</option>
                    <option value="Every day">Setiap hari</option>
                    <option value="Yes">Ya</option>
                    <option value="No">Tidak</option>
                </select>
            </div>

            <!-- Aktivitas Olahraga -->
            <div>
                <label for="aktivitas_olahraga" class="block text-sm font-medium">Aktivitas Olahraga</label>
                <select name="aktivitas_olahraga" id="aktivitas_olahraga" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                    <option value="Never">Tidak Pernah</option>
                    <option value="Rarely (1-2 times a week)">Jarang (1-2 kali/minggu)</option>
                    <option value="Sometimes (3-4 times a week)">Kadang-kadang (3-4 kali/minggu)</option>
                    <option value="Often (5-6 times a week)">Sering (5-6 kali/minggu)</option>
                    <option value="Every day">Setiap hari</option>
                    <option value="Yes">Ya</option>
                    <option value="No">Tidak</option>
                </select>
            </div>

            <!-- Tingkat Stres -->
            <div>
                <label for="tingkat_stres" class="block text-sm font-medium">Tingkat Stres</label>
                <select name="tingkat_stres" id="tingkat_stres" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                    <option value="No stress">Tidak Stres</option>
                    <option value="Low stress">Stres Rendah</option>
                    <option value="Moderate">Stres Sedang</option>
                    <option value="High stress">Stres Tinggi</option>
                    <option value="Very High">Sangat Tinggi</option>
                    <option value="Extremely high stress">Ekstrem</option>
                </select>
            </div>

            <!-- Performa Akademik -->
            <div>
                <label for="performa_akademik" class="block text-sm font-medium">Performa Akademik</label>
                <select name="performa_akademik" id="performa_akademik" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                    <option value="Excellent">Sangat Baik</option>
                    <option value="Good">Baik</option>
                    <option value="Average">Cukup</option>
                    <option value="Below Average">Di Bawah Rata-rata</option>
                    <option value="Poor">Buruk</option>
                </select>
            </div>

            <!-- Kategori Insomnia -->
            <div>
                <label for="kategori_insomnia" class="block text-sm font-medium">Kategori Insomnia</label>
                <select name="kategori_insomnia" id="kategori_insomnia" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2 text-white">
                    <option value="0">Tidak Ada Insomnia</option>
                    <option value="1">Insomnia Ringan</option>
                    <option value="2">Insomnia Parah</option>
                </select>
            </div>
        </div>

        <!-- Tombol -->
        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection