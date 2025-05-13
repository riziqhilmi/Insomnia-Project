<x-app-layout>
    @include('auth.sidebar')

    @include('layouts.navigation') {{-- Navbar di atas konten utama, geser kanan pakai ml-64 --}}

    <style>
        /* Efek bintang untuk main-content */
        #main-content::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: transparent url('data:image/svg+xml;utf8,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="2" cy="2" r="1" fill="white" opacity="0.8"/><circle cx="30" cy="50" r="1.2" fill="white" opacity="0.6"/><circle cx="70" cy="80" r="1" fill="white" opacity="0.7"/></svg>') repeat;
            animation: starfield 100s linear infinite;
            z-index: 0;
            opacity: 0.12;
            pointer-events: none;
        }

        @keyframes starfield {
            0% { background-position: 0 0; }
            100% { background-position: -1000px 1000px; }
        }

        /* Pastikan konten tetap di atas layer bintang */
        #main-content > * {
            position: relative;
            z-index: 1;
        }
    </style>

    <div id="main-content" class="relative ml-64 transition-all duration-300 min-h-screen bg-gray-900 py-12 px-6 text-white">
        <div class="bg-gray-800 p-6 rounded shadow mb-6">
            <h1 class="text-3xl font-bold text-blue-400">Data Master</h1>
            <p class="mt-2 text-gray-300">Halaman ini berisi pengelolaan data master.</p>
        </div>
<div class="bg-gray-800 p-6 rounded shadow mb-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-white">Tabel Data Master Predision</h2>
        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Tambah Data
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-900 text-white border border-gray-700 rounded shadow">
            <thead class="bg-gray-700 text-gray-300">
                <tr>
                    <th class="py-2 px-4 text-left">#</th>
                    <th class="py-2 px-4 text-left">Tahun Akademik</th>
                    <th class="py-2 px-4 text-left">Jenis Kelamin</th>
                    <th class="py-2 px-4 text-left">Lama Tidur</th>
                    <th class="py-2 px-4 text-left">Kesulitan Konsentrasi</th>
                    <th class="py-2 px-4 text-left">Ketidakhadiran Kuliah</th>
                    <th class="py-2 px-4 text-left">Perangkat Sebelum Tidur</th>
                    <th class="py-2 px-4 text-left">Konsumsi Kafein</th>
                    <th class="py-2 px-4 text-left">Olahraga</th>
                    <th class="py-2 px-4 text-left">Tingkat Stres</th>
                    <th class="py-2 px-4 text-left">Performa Akademik</th>
                    <th class="py-2 px-4 text-left">Kategori Insomnia</th>
                    <th class="py-2 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- data dummy --}}
                <tr class="border-t border-gray-700 hover:bg-gray-800">
                    <td class="py-2 px-4">1</td>
                    <td class="py-2 px-4">2024/2025</td>
                    <td class="py-2 px-4">Perempuan</td>
                    <td class="py-2 px-4">5</td>
                    <td class="py-2 px-4">Ya</td>
                    <td class="py-2 px-4">3</td>
                    <td class="py-2 px-4">Sering</td>
                    <td class="py-2 px-4">Ya</td>
                    <td class="py-2 px-4">Jarang</td>
                    <td class="py-2 px-4">Tinggi</td>
                    <td class="py-2 px-4">Cukup</td>
                    <td class="py-2 px-4 text-red-400 font-semibold">Tinggi</td>
                    <td class="py-2 px-4">
                        <button class="text-blue-400 hover:underline">Edit</button>
                        <button class="text-red-400 hover:underline ml-2">Hapus</button>
                    </td>
                </tr>
                <tr class="border-t border-gray-700 hover:bg-gray-800">
                    <td class="py-2 px-4">2</td>
                    <td class="py-2 px-4">2023/2024</td>
                    <td class="py-2 px-4">Laki-laki</td>
                    <td class="py-2 px-4">7</td>
                    <td class="py-2 px-4">Tidak</td>
                    <td class="py-2 px-4">1</td>
                    <td class="py-2 px-4">Kadang-kadang</td>
                    <td class="py-2 px-4">Tidak</td>
                    <td class="py-2 px-4">Rutin</td>
                    <td class="py-2 px-4">Rendah</td>
                    <td class="py-2 px-4">Baik</td>
                    <td class="py-2 px-4 text-green-400 font-semibold">Rendah</td>
                    <td class="py-2 px-4">
                        <button class="text-blue-400 hover:underline">Edit</button>
                        <button class="text-red-400 hover:underline ml-2">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

    </div>
</x-app-layout>