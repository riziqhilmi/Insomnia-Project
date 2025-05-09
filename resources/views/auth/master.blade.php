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
        {{-- Tambahkan konten data master di sini --}}
    </div>
</x-app-layout>