<x-app-layout>
    @include('auth.sidebar')

    @include('layouts.navigation') {{-- Navbar di atas konten utama, geser kanan pakai ml-64 --}}

    @push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Grafik 1: Jumlah kategori insomnia
    const ctxBar = document.getElementById('insomniaChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Rendah', 'Sedang', 'Tinggi'],
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: [10, 15, 5], // data dummy
                backgroundColor: ['#22c55e', '#eab308', '#ef4444'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: { color: 'white' }
                }
            },
            scales: {
                x: {
                    ticks: { color: 'white' }
                },
                y: {
                    ticks: { color: 'white' },
                    beginAtZero: true
                }
            }
        }
    });

    // Grafik 2: Rata-rata lama tidur per tahun
    const ctxLine = document.getElementById('tidurChart').getContext('2d');
    new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: ['2022/2023', '2023/2024', '2024/2025'],
            datasets: [{
                label: 'Rata-rata Lama Tidur (jam)',
                data: [6.2, 5.7, 6.5],
                fill: false,
                borderColor: '#3b82f6',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: { color: 'white' }
                }
            },
            scales: {
                x: {
                    ticks: { color: 'white' }
                },
                y: {
                    ticks: { color: 'white' },
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush

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

        #main-content > * {
            position: relative;
            z-index: 1;
        }
    </style>

    <div id="main-content" class="relative ml-64 transition-all duration-300 min-h-screen bg-gray-900 py-12 px-6 text-white">
        <div class="bg-gray-800 p-6 rounded shadow mb-6">
            <h1 class="text-3xl font-bold text-blue-400">Visualisasi</h1>
            <p class="mt-2 text-gray-300">Halaman ini menyajikan visualisasi data dalam bentuk grafik.</p>
        </div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Grafik 1 --}}
    <div class="bg-gray-800 p-6 rounded shadow">
        <h2 class="text-2xl font-semibold text-white mb-4">Kategori Insomnia</h2>
        <canvas id="insomniaChart" class="w-full h-64"></canvas>
    </div>

    {{-- Grafik 2 --}}
    <div class="bg-gray-800 p-6 rounded shadow">
        <h2 class="text-2xl font-semibold text-white mb-4">Rata-rata Lama Tidur per Tahun Akademik</h2>
        <canvas id="tidurChart" class="w-full h-64"></canvas>
    </div>

    {{-- Tambahkan grafik lainnya di sini jika ada --}}
    {{-- Contoh Grafik 3 --}}
    <div class="bg-gray-800 p-6 rounded shadow">
        <h2 class="text-2xl font-semibold text-white mb-4">Grafik Dummy 3</h2>
        <canvas id="grafik3" class="w-full h-64"></canvas>
    </div>

    {{-- Contoh Grafik 4 --}}
    <div class="bg-gray-800 p-6 rounded shadow">
        <h2 class="text-2xl font-semibold text-white mb-4">Grafik Dummy 4</h2>
        <canvas id="grafik4" class="w-full h-64"></canvas>
    </div>
</div>

    </div>
</x-app-layout>
