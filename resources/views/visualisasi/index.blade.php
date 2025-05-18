@extends('layouts.app')

@section('content')
<div id="main-content" class="relative transition-all duration-300 min-h-screen bg-gray-900 py-12 px-8 text-white">
<div class="mb-4">
    <h2 class="text-2xl font-semibold text-blue-200">Visualisasi Data Mahasiswa</h2>

    <form method="GET" action="{{ route('visualisasi.index') }}" class="mt-4 flex flex-wrap items-center space-x-2">
        <label for="tipe" class="text-blue-100">Pilih Visualisasi:</label>
        <select name="tipe" id="tipe" onchange="this.form.submit()"
                class="rounded px-3 py-1 bg-slate-800 text-blue-100 border border-blue-400">
            <option value="kategori_insomnia" {{ $tipe == 'kategori_insomnia' ? 'selected' : '' }}>Kategori Insomnia</option>
            <option value="jenis_kelamin" {{ $tipe == 'jenis_kelamin' ? 'selected' : '' }}>Jenis Kelamin</option>
            <option value="tahun_akademik" {{ $tipe == 'tahun_akademik' ? 'selected' : '' }}>Tahun Akademik</option>
            <option value="lama_tidur" {{ $tipe == 'lama_tidur' ? 'selected' : '' }}>Lama Tidur</option>
            <option value="tingkat_stres" {{ $tipe == 'tingkat_stres' ? 'selected' : '' }}>Tingkat Stres</option>
        </select>
    </form>
</div>

<div class="bg-slate-700 p-4 rounded shadow mb-6">
    <canvas id="chart"></canvas>
</div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartData = @json($data);
    const labels = chartData.map(d => d['{{ $tipe }}']);
    const counts = chartData.map(d => d.total);

    const ctx = document.getElementById('chart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '{{ $label }}',
                data: counts,
                backgroundColor: 'rgba(59, 130, 246, 0.5)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: '#334155'
                    }
                },
                x: {
                    ticks: {
                        color: 'white',
                        autoSkip: false,
                        maxRotation: 45,
                        minRotation: 45,
                    },
                    grid: {
                        color: '#334155'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white'
                    }
                }
            }
        }
    });
</script>
@endpush
