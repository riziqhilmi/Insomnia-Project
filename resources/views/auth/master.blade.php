<x-app-layout>
    @include('auth.sidebar')
    @include('layouts.navigation')

    <style>
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
            <h1 class="text-3xl font-bold text-blue-400">Data Master</h1>
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
                            <th class="py-2 px-4 text-left">Kafein</th>
                            <th class="py-2 px-4 text-left">Olahraga</th>
                            <th class="py-2 px-4 text-left">Tingkat Stres</th>
                            <th class="py-2 px-4 text-left">Performa Akademik</th>
                            <th class="py-2 px-4 text-left">Kategori Insomnia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataMaster as $index => $item)
                            <tr class="border-t border-gray-700 hover:bg-gray-800">
                                <td class="py-2 px-4">{{ ($dataMaster->currentPage() - 1) * $dataMaster->perPage() + $index + 1 }}</td>
                                <td class="py-2 px-4">{{ __('Tahun '.ucfirst(str_replace('Year', '', strtolower($item['year'])))) }}</td>
                                <td class="py-2 px-4">{{ $item['gender'] === 'Male' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td class="py-2 px-4">{{ $item['sleep_hours'] }}</td>
                                <td class="py-2 px-4">{{ match($item['concentration']) {
                                    'Never' => 'Tidak Pernah',
                                    'Sometimes' => 'Kadang-kadang',
                                    'Often' => 'Sering',
                                    'Always' => 'Selalu',
                                } }}</td>
                                <td class="py-2 px-4">{{ match($item['miss_class']) {
                                    'Never' => 'Tidak Pernah',
                                    'Sometimes' => 'Kadang-kadang',
                                    'Often' => 'Sering',
                                } }}</td>
                                <td class="py-2 px-4">{{ match($item['device_use']) {
                                    'Rarely' => 'Jarang',
                                    'Sometimes' => 'Kadang-kadang',
                                    'Frequently' => 'Sering',
                                } }}</td>
                                <td class="py-2 px-4">{{ $item['caffeine'] === 'Yes' ? 'Ya' : 'Tidak' }}</td>
                                <td class="py-2 px-4">{{ $item['exercise'] === 'Yes' ? 'Ya' : 'Tidak' }}</td>
                                <td class="py-2 px-4">{{ match($item['stress']) {
                                    'Low' => 'Rendah',
                                    'Moderate' => 'Sedang',
                                    'High' => 'Tinggi',
                                    'Very High' => 'Sangat Tinggi',
                                } }}</td>
                                <td class="py-2 px-4">{{ match($item['performance']) {
                                    'Poor' => 'Buruk',
                                    'Average' => 'Cukup',
                                    'Good' => 'Baik',
                                    'Excellent' => 'Sangat Baik',
                                } }}</td>
                                <td class="py-2 px-4 font-semibold {{ match($item['actual']) {
                                    0 => 'text-green-400',
                                    1 => 'text-yellow-400',
                                    2 => 'text-red-400',
                                    default => 'text-gray-400',
                                } }}">{{ match($item['actual']) {
                                    0 => 'Tidak Insomnia (0)',
                                    1 => 'Risiko Insomnia (1)',
                                    2 => 'Insomnia (2)',
                                    default => 'Tidak Diketahui',
                                } }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- PAGINATION NAVIGATION -->
                <div class="mt-6">
                    {{ $dataMaster->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
