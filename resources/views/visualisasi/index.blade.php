@extends('layouts.app')

@section('content')
<div id="main-content" class="relative transition-all duration-300 min-h-screen bg-gray-900 py-8 px-4 sm:px-6 lg:px-8 text-white">
    <div class="max-w-7xl mx-auto">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-blue-300 mb-2">Visualisasi Data Insomnia Mahasiswa</h2>
            <p class="text-blue-100">Analisis prediksi insomnia berdasarkan berbagai faktor</p>
            
            <form method="GET" action="{{ route('visualisasi.index') }}" class="mt-6">
                <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <label for="tipe" class="text-blue-100 text-lg font-medium">Pilih Kategori:</label>
                    <select name="tipe" id="tipe" onchange="this.form.submit()"
                            class="rounded-lg px-4 py-2 bg-slate-800 text-blue-100 border border-blue-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                        <option value="kategori_insomnia" {{ $tipe == 'kategori_insomnia' ? 'selected' : '' }}>Kategori Insomnia</option>
                        <option value="gender" {{ $tipe == 'gender' ? 'selected' : '' }}>Jenis Kelamin</option>
                        <option value="year" {{ $tipe == 'year' ? 'selected' : '' }}>Tahun Akademik</option>
                        <option value="sleep_hours" {{ $tipe == 'sleep_hours' ? 'selected' : '' }}>Lama Tidur</option>
                        <option value="stress" {{ $tipe == 'stress' ? 'selected' : '' }}>Tingkat Stres</option>
                        <option value="sleep_quality" {{ $tipe == 'sleep_quality' ? 'selected' : '' }}>Kualitas Tidur</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- Main Distribution Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Bar Chart Card -->
            <div class="bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700 transform hover:scale-[1.01] transition-transform duration-300">
                <h3 class="text-xl font-semibold text-blue-200 mb-4">Distribusi {{ $label }}</h3>
                <div class="h-80">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
            
            <!-- Pie Chart Card -->
            <div class="bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700 transform hover:scale-[1.01] transition-transform duration-300">
                <h3 class="text-xl font-semibold text-blue-200 mb-4">Persentase {{ $label }}</h3>
                <div class="h-80">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Additional Visualizations -->
        <div class="grid grid-cols-1 gap-6 mb-8">
            <!-- Trend Over Time -->
            <div class="bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700">
                <h3 class="text-xl font-semibold text-blue-200 mb-4">Tren Insomnia Minggu Ini</h3>
                <div class="h-96">
                    <canvas id="trendChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Combo Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Sleep Quality Distribution -->
            <div class="bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700">
                <h3 class="text-xl font-semibold text-blue-200 mb-4">Kualitas Tidur vs Kategori Insomnia</h3>
                <div class="h-80">
                    <canvas id="sleepQualityChart"></canvas>
                </div>
            </div>
            
            <!-- Stress vs Sleep Hours -->
            <div class="bg-slate-800 p-6 rounded-xl shadow-lg border border-slate-700">
                <h3 class="text-xl font-semibold text-blue-200 mb-4">Tingkat Stres vs Lama Tidur</h3>
                <div class="h-80">
                    <canvas id="stressSleepChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script>
    // Color palette
    const colors = {
        blue: 'rgba(59, 130, 246, 0.7)',
        blueLight: 'rgba(96, 165, 250, 0.7)',
        yellow: 'rgba(250, 204, 21, 0.7)',
        red: 'rgba(248, 113, 113, 0.7)',
        green: 'rgba(52, 211, 153, 0.7)',
        purple: 'rgba(167, 139, 250, 0.7)',
        orange: 'rgba(251, 146, 60, 0.7)',
        teal: 'rgba(45, 212, 191, 0.7)'
    };

    // Mapping label ke Bahasa Indonesia
    const mappingIndo = {
        'Tidak ada insomnia': 'Tidak Ada Insomnia',
        'Risiko Insomnia': 'Risiko Insomnia',
        'Insomnia': 'Insomnia',
        'Male': 'Laki-laki',
        'Female': 'Perempuan',
        'First year': 'Tahun Pertama',
        'Second year': 'Tahun Kedua',
        'Third year': 'Tahun Ketiga',
        'Graduate student': 'Mahasiswa PascaSarjana',
        '6-7 hours': '6-7 jam',
        '4-5 hours': '4-5 jam',
        'Less than 4 hours': '< 4 jam',
        'More than 8 hours': '> 8 jam',
        'Low stress': 'Stres Rendah',
        'High stress': 'Stres Tinggi',
        'Extremely high stress': 'Stres Sangat Tinggi',
        'No stress': 'Tidak Stres',
        'Good': 'Baik',
        'Average': 'Cukup',
        'Poor': 'Buruk',
        'Excellent': 'Sangat Baik'
    };

    // Main Distribution Charts
    const chartData = @json($data);
    const labels = chartData.map(d => mappingIndo[d['value']] ?? d['value']);
    const counts = chartData.map(d => d.total);

    // Bar Chart
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: counts,
                backgroundColor: [
                    colors.green,
                    colors.yellow,
                    colors.red,
                    colors.blue,
                    colors.purple,
                    colors.orange
                ],
                borderColor: [
                    colors.green.replace('0.7', '1'),
                    colors.yellow.replace('0.7', '1'),
                    colors.red.replace('0.7', '1'),
                    colors.blue.replace('0.7', '1'),
                    colors.purple.replace('0.7', '1'),
                    colors.orange.replace('0.7', '1')
                ],
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    backgroundColor: 'rgba(15, 23, 42, 0.9)',
                    titleColor: '#e2e8f0',
                    bodyColor: '#e2e8f0',
                    borderColor: '#334155',
                    borderWidth: 1,
                    padding: 12,
                    usePointStyle: true,
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#94a3b8',
                        font: {
                            weight: '500'
                        }
                    },
                    grid: {
                        color: '#334155',
                        drawBorder: false
                    }
                },
                x: {
                    ticks: {
                        color: '#94a3b8',
                        font: {
                            weight: '500'
                        }
                    },
                    grid: {
                        display: false,
                        drawBorder: false
                    }
                }
            }
        }
    });

    // Pie Chart
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: counts,
                backgroundColor: [
                    colors.green,
                    colors.yellow,
                    colors.red,
                    colors.blue,
                    colors.purple,
                    colors.orange
                ],
                borderColor: '#1e293b',
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        color: '#e2e8f0',
                        padding: 16,
                        font: {
                            size: 14
                        },
                        usePointStyle: true,
                        pointStyle: 'circle'
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(15, 23, 42, 0.9)',
                    titleColor: '#e2e8f0',
                    bodyColor: '#e2e8f0',
                    borderColor: '#334155',
                    borderWidth: 1,
                    padding: 12,
                },
                datalabels: {
                    display: false
                }
            }
        },
        plugins: [ChartDataLabels]
    });

    // Trend Over Time Chart
    const trendData = @json($insomniaTrends);
    const trendCtx = document.getElementById('trendChart').getContext('2d');
    new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: trendData.map(d => d.date),
            datasets: [
                {
                    label: 'Tidak Ada Insomnia',
                    data: trendData.map(d => d.none),
                    borderColor: colors.green.replace('0.7', '1'),
                    backgroundColor: colors.green,
                    tension: 0.3,
                    fill: true
                },
                {
                    label: 'Risiko Insomnia',
                    data: trendData.map(d => d.risk),
                    borderColor: colors.yellow.replace('0.7', '1'),
                    backgroundColor: colors.yellow,
                    tension: 0.3,
                    fill: true
                },
                {
                    label: 'Insomnia',
                    data: trendData.map(d => d.insomnia),
                    borderColor: colors.red.replace('0.7', '1'),
                    backgroundColor: colors.red,
                    tension: 0.3,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: '#e2e8f0',
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(15, 23, 42, 0.9)',
                    titleColor: '#e2e8f0',
                    bodyColor: '#e2e8f0',
                    borderColor: '#334155',
                    borderWidth: 1,
                    padding: 12,
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#94a3b8',
                        font: {
                            weight: '500'
                        }
                    },
                    grid: {
                        color: '#334155',
                        drawBorder: false
                    }
                },
                x: {
                    ticks: {
                        color: '#94a3b8',
                        font: {
                            weight: '500'
                        }
                    },
                    grid: {
                        color: '#334155',
                        drawBorder: false
                    }
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            }
        }
    });

    // Sleep Quality vs Insomnia Chart
    const sleepQualityData = @json($sleepQualityDistribution);
    const sleepQualityCtx = document.getElementById('sleepQualityChart').getContext('2d');
    new Chart(sleepQualityCtx, {
        type: 'bar',
        data: {
            labels: sleepQualityData.map(d => mappingIndo[d.quality] ?? d.quality),
            datasets: [
                {
                    label: 'Tidak Ada Insomnia',
                    data: sleepQualityData.map(d => d.none),
                    backgroundColor: colors.green,
                    borderColor: colors.green.replace('0.7', '1'),
                    borderWidth: 1,
                    borderRadius: 4
                },
                {
                    label: 'Risiko Insomnia',
                    data: sleepQualityData.map(d => d.risk),
                    backgroundColor: colors.yellow,
                    borderColor: colors.yellow.replace('0.7', '1'),
                    borderWidth: 1,
                    borderRadius: 4
                },
                {
                    label: 'Insomnia',
                    data: sleepQualityData.map(d => d.insomnia),
                    backgroundColor: colors.red,
                    borderColor: colors.red.replace('0.7', '1'),
                    borderWidth: 1,
                    borderRadius: 4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: '#e2e8f0',
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(15, 23, 42, 0.9)',
                    titleColor: '#e2e8f0',
                    bodyColor: '#e2e8f0',
                    borderColor: '#334155',
                    borderWidth: 1,
                    padding: 12,
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    stacked: false,
                    ticks: {
                        color: '#94a3b8',
                        font: {
                            weight: '500'
                        }
                    },
                    grid: {
                        color: '#334155',
                        drawBorder: false
                    }
                },
                x: {
                    stacked: false,
                    ticks: {
                        color: '#94a3b8',
                        font: {
                            weight: '500'
                        }
                    },
                    grid: {
                        display: false,
                        drawBorder: false
                    }
                }
            }
        }
    });

    // Stress vs Sleep Hours Bubble Chart
    const stressSleepData = @json($stressVsSleepHours);
    
    // Process data for bubble chart
    const bubbleData = stressSleepData.map(item => {
        const stressLevels = {
            'No stress': 1,
            'Low stress': 2,
            'High stress': 3,
            'Extremely high stress': 4
        };
        
        const sleepHours = {
            '< 4 jam': 3,
            '4-5 jam': 4,
            '6-7 jam': 6.5,
            '> 8 jam': 8.5
        };
        
        return {
            x: sleepHours[mappingIndo[item.sleep_hours] ?? 6.5],
            y: stressLevels[item.stress] ?? 2,
            r: 10,
            category: item.category,
            label: `${mappingIndo[item.sleep_hours] ?? item.sleep_hours} | ${mappingIndo[item.stress] ?? item.stress}`
        };
    });

    // Group by category for coloring
    const bubbleDatasets = [
        {
            label: 'Tidak Ada Insomnia',
            data: bubbleData.filter(d => d.category === 'Tidak ada insomnia'),
            backgroundColor: colors.green,
            borderColor: colors.green.replace('0.7', '1')
        },
        {
            label: 'Risiko Insomnia',
            data: bubbleData.filter(d => d.category === 'Risiko Insomnia'),
            backgroundColor: colors.yellow,
            borderColor: colors.yellow.replace('0.7', '1')
        },
        {
            label: 'Insomnia',
            data: bubbleData.filter(d => d.category === 'Insomnia'),
            backgroundColor: colors.red,
            borderColor: colors.red.replace('0.7', '1')
        }
    ];

    const stressSleepCtx = document.getElementById('stressSleepChart').getContext('2d');
    new Chart(stressSleepCtx, {
        type: 'bubble',
        data: {
            datasets: bubbleDatasets
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: '#e2e8f0',
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(15, 23, 42, 0.9)',
                    titleColor: '#e2e8f0',
                    bodyColor: '#e2e8f0',
                    borderColor: '#334155',
                    borderWidth: 1,
                    padding: 12,
                    callbacks: {
                        label: function(context) {
                            const data = context.raw;
                            return data.label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'Tingkat Stres',
                        color: '#94a3b8'
                    },
                    min: 0,
                    max: 5,
                    ticks: {
                        color: '#94a3b8',
                        font: {
                            weight: '500'
                        },
                        callback: function(value) {
                            const levels = {
                                1: 'Tidak Stres',
                                2: 'Stres Rendah',
                                3: 'Stres Tinggi',
                                4: 'Stres Sangat Tinggi'
                            };
                            return levels[value] || '';
                        }
                    },
                    grid: {
                        color: '#334155',
                        drawBorder: false
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Lama Tidur (jam)',
                        color: '#94a3b8'
                    },
                    min: 2,
                    max: 10,
                    ticks: {
                        color: '#94a3b8',
                        font: {
                            weight: '500'
                        }
                    },
                    grid: {
                        color: '#334155',
                        drawBorder: false
                    }
                }
            }
        }
    });
</script>
@endpush