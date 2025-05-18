@extends('layouts.app')

@section('content')
<div id="main-content" class="relative transition-all duration-300 min-h-screen bg-gray-900 py-12 px-8 text-white">
        <div class="bg-gray-800 p-6 rounded shadow-lg mb-6">
            <h1 class="text-4xl font-bold text-blue-400 mb-2">Dashboard</h1>
        </div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-slate-700 p-4 rounded shadow">
        <h3 class="text-blue-200 text-xl mb-2">Total Data</h3>
        <p class="text-2xl font-bold text-white">{{ $total }}</p>
    </div>
    <div class="bg-slate-700 p-4 rounded shadow">
        <h3 class="text-blue-200 text-xl mb-2">Tidak Insomnia</h3>
        <p class="text-2xl font-bold text-white">{{ $tidak }}</p>
    </div>
    <div class="bg-slate-700 p-4 rounded shadow">
        <h3 class="text-blue-200 text-xl mb-2">Risiko Insomnia</h3>
        <p class="text-2xl font-bold text-white">{{ $risiko }}</p>
    </div>
    <div class="bg-slate-700 p-4 rounded shadow">
        <h3 class="text-blue-200 text-xl mb-2">Insomnia</h3>
        <p class="text-2xl font-bold text-white">{{ $insomnia }}</p>
    </div>
</div>

<div class="bg-slate-700 p-4 rounded shadow">
    <h3 class="text-blue-200 text-xl mb-4">Distribusi Kategori Insomnia</h3>
    <canvas id="insomniaChart" height="100"></canvas>
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
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>
@endsection
