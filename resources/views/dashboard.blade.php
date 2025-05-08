<x-app-layout>
    @include('auth.sidebar')

    @include('layouts.navigation') {{-- Navbar di atas konten utama, geser kanan pakai ml-64 --}}
    
    <div class="ml-64 min-h-screen bg-gray-900 py-12 px-8 text-white">
        <div class="bg-gray-800 p-6 rounded shadow-lg mb-6">
            <h1 class="text-4xl font-bold text-blue-400 mb-2">Dashboard</h1>
            <p class="text-gray-300">Selamat datang kembali, <strong>{{ Auth::user()->name }}</strong>.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-700 p-6 rounded-lg shadow hover:shadow-xl transition">
                <h2 class="text-xl font-semibold text-white mb-2">Statistik</h2>
                <p class="text-gray-400">Jumlah Data: <strong>120</strong></p>
            </div>
            <div class="bg-gray-700 p-6 rounded-lg shadow hover:shadow-xl transition">
                <h2 class="text-xl font-semibold text-white mb-2">Akurasi Prediksi</h2>
                <p class="text-gray-400">92%</p>
            </div>
            <div class="bg-gray-700 p-6 rounded-lg shadow hover:shadow-xl transition">
                <h2 class="text-xl font-semibold text-white mb-2">Tanggal</h2>
                <p class="text-gray-400">{{ now()->toFormattedDateString() }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
