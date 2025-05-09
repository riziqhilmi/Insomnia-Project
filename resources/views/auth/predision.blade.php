<x-app-layout>
    @include('auth.sidebar')

    @include('layouts.navigation') {{-- Navbar di atas konten utama, geser kanan pakai ml-64 --}}

    <div id="main-content" class="ml-64 transition-all duration-300 min-h-screen bg-gray-900 py-12 px-6 text-white">
        <div class="bg-gray-800 p-6 rounded shadow mb-6">
            <h1 class="text-3xl font-bold text-blue-400">Prediksi</h1>
            <p class="mt-2 text-gray-300">Halaman ini menampilkan hasil prediksi berdasarkan data yang tersedia.</p>
        </div>
        {{-- Tambahkan konten prediksi di sini --}}
    </div>
</x-app-layout>
