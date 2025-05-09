<x-app-layout>
    @include('auth.sidebar')

    @include('layouts.navigation') {{-- Navbar di atas konten utama --}}

    <style>
/* Efek bintang untuk dashboard */
#main-content::before {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: transparent url('data:image/svg+xml;utf8,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="2" cy="2" r="1" fill="white" opacity="0.8"/><circle cx="30" cy="50" r="1.2" fill="white" opacity="0.6"/><circle cx="70" cy="80" r="1" fill="white" opacity="0.7"/></svg>') repeat;
    animation: starfield 100s linear infinite;
    z-index: 0;
    opacity: 0.15;
    pointer-events: none;
}

/* Animasi bintang */
@keyframes starfield {
    0% { background-position: 0 0; }
    100% { background-position: -1200px 1200px; }
}

/* Pastikan konten dashboard tetap di atas layer bintang */
#main-content > * {
    position: relative;
    z-index: 1;
}
</style>

    <!-- Konten Utama yang Bisa Bergeser -->
    <div id="main-content" class="relative ml-64 transition-all duration-300 min-h-screen bg-gray-900 py-12 px-8 text-white">
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