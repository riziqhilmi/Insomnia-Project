@extends('layouts.app')


<style>
@keyframes floating {
  0% { transform: translateY(0px); }
  50% { transform: translateY(-5px); }
  100% { transform: translateY(0px); }
}

.animate-floating {
  animation: floating 3s ease-in-out infinite;
}
</style>


@section('content')
<div id="main-content" class="relative transition-all duration-300 min-h-screen bg-gray-900 py-12 px-8 text-white">

    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-700 to-blue-400 p-6 rounded-lg shadow-lg mb-8">
        <h1 class="text-4xl font-extrabold text-white tracking-wide">Dashboard INSOMNIC</h1>
        <p class="text-blue-100 mt-2">Statistik dan visualisasi kategori insomnia mahasiswa</p>
    </div>

    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-slate-800 hover:bg-slate-700 p-6 rounded-lg shadow transition">
            <div class="flex items-center justify-between mb-3">
                <h3 class="text-blue-200 text-lg font-semibold">Total Data</h3>
                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                     d="M3 10h11M9 21V3m0 0L5 7m4-4l4 4" /></svg>
            </div>
            <p class="text-3xl font-bold text-white">{{ $total }}</p>
        </div>

        <div class="bg-slate-800 hover:bg-slate-700 p-6 rounded-lg shadow transition">
            <div class="flex items-center justify-between mb-3">
                <h3 class="text-green-300 text-lg font-semibold">Tidak Insomnia</h3>
                <svg class="w-6 h-6 text-green-300" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                     d="M5 13l4 4L19 7" /></svg>
            </div>
            <p class="text-3xl font-bold text-white">{{ $tidak }}</p>
        </div>

        <div class="bg-slate-800 hover:bg-slate-700 p-6 rounded-lg shadow transition">
            <div class="flex items-center justify-between mb-3">
                <h3 class="text-yellow-300 text-lg font-semibold">Risiko Insomnia</h3>
                <svg class="w-6 h-6 text-yellow-300" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                     d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" /></svg>
            </div>
            <p class="text-3xl font-bold text-white">{{ $risiko }}</p>
        </div>

        <div class="bg-slate-800 hover:bg-slate-700 p-6 rounded-lg shadow transition">
            <div class="flex items-center justify-between mb-3">
                <h3 class="text-red-400 text-lg font-semibold">Insomnia</h3>
                <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                     d="M18.364 5.636a9 9 0 11-12.728 0M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
            </div>
            <p class="text-3xl font-bold text-white">{{ $insomnia }}</p>
        </div>
    </div>

    <!-- Chart -->
    <div class="bg-slate-800 p-6 rounded-lg shadow">
        <h3 class="text-blue-300 text-xl font-semibold mb-4">📈 Distribusi Kategori Insomnia</h3>
        <canvas id="insomniaChart" height="100"></canvas>
    </div>

<!-- Koala Fixed Floating -->
<div id="koala-container" 
     class="fixed bottom-6 right-6 z-50 cursor-move select-none"
     style="width: 100px; height: 100px;">
    <img id="koala"
         src="{{ asset('img/koala.png') }}"
         alt="Chibi Koala"
         class="w-full h-full animate-floating" />
    <div id="zzz" class="absolute -top-4 left-2 text-blue-300 font-bold text-lg animate-pulse">Zzz...</div>
</div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('insomniaChart').getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Tidak Insomnia', 'Risiko Insomnia', 'Insomnia'],
        datasets: [{
            label: 'Jumlah Mahasiswa',
            data: @json([$tidak, $risiko, $insomnia]),
            backgroundColor: ['#38bdf8', '#facc15', '#f87171'],
            borderRadius: 8,
            hoverBackgroundColor: ['#0ea5e9', '#eab308', '#ef4444']
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: { color: '#cbd5e1' },
                grid: { color: '#334155' }
            },
            x: {
                ticks: { color: '#cbd5e1' },
                grid: { color: '#334155' }
            }
        },
        plugins: {
            legend: {
                labels: {
                    color: '#e2e8f0'
                }
            }
        }
    }
});

// DRAG & BOUNCE KOALA
const koalaContainer = document.getElementById('koala-container');
const koala = document.getElementById('koala');

let isDragging = false;
let offsetX = 0;
let offsetY = 0;

koalaContainer.style.position = 'fixed'; // jaga agar posisinya tetap bisa dipindah

koalaContainer.addEventListener('mousedown', function(e) {
    isDragging = true;
    offsetX = e.clientX - koalaContainer.getBoundingClientRect().left;
    offsetY = e.clientY - koalaContainer.getBoundingClientRect().top;
});

document.addEventListener('mousemove', function(e) {
    if (isDragging) {
        koalaContainer.style.left = `${e.clientX - offsetX}px`;
        koalaContainer.style.top = `${e.clientY - offsetY}px`;
        koalaContainer.style.bottom = 'auto';
        koalaContainer.style.right = 'auto';
    }
});

document.addEventListener('mouseup', function() {
    isDragging = false;
});

// Bounce ketika diklik
koala.addEventListener('click', () => {
    koala.classList.add('animate-bounce');
    setTimeout(() => {
        koala.classList.remove('animate-bounce');
    }, 1000);
});
</script>
@endsection