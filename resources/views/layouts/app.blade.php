<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insomnia Predict - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        /* Star effect for sidebar */
        #sidebar::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent url('data:image/svg+xml;utf8,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="2" cy="2" r="1" fill="white" opacity="0.8"/><circle cx="30" cy="50" r="1.2" fill="white" opacity="0.6"/><circle cx="70" cy="80" r="1" fill="white" opacity="0.7"/></svg>') repeat;
            animation: starfield 100s linear infinite;
            opacity: 0.12;
            pointer-events: none;
            z-index: 0;
        }
        @keyframes starfield {
            0% { background-position: 0 0; }
            100% { background-position: -1000px 1000px; }
        }
        /* keep sidebar content above stars */
        #sidebar > * { position: relative; z-index: 1; }
    </style>
</head>
<body class="bg-slate-900 text-blue-100 font-sans">
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 bg-gradient-to-b from-gray-900 to-gray-800 text-white shadow-lg z-40 w-64 transition-all duration-300 flex flex-col">
        <div class="p-4 text-2xl font-extrabold text-blue-400 border-b border-gray-700">
            <span id="brand-text" class="transition-all duration-300">INSOMNIC ADMIN</span>
        </div>
        <nav class="p-4 space-y-2 flex-1">
            <a href="/dashboard" class="flex items-center space-x-3 px-4 py-2 rounded hover:bg-gray-700 transition-colors {{ Route::is('dashboard') ? 'bg-gray-800' : '' }}">
                <svg class="w-5 h-5 text-blue-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4" /></svg>
                <span class="sidebar-text transition-opacity duration-300 opacity-100">Dashboard</span>
            </a>

            <a href="/data-master" class="flex items-center space-x-3 px-4 py-2 rounded hover:bg-gray-700 transition-colors {{ Route::is('master') ? 'bg-gray-800' : '' }}">
                <svg class="w-5 h-5 text-blue-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>
                <span class="sidebar-text">Data Master</span>
            </a>

            <a href="/edukasi" class="flex items-center space-x-3 px-4 py-2 rounded hover:bg-gray-700 transition-colors {{ Route::is('predision') ? 'bg-gray-800' : '' }}">
                <svg class="w-5 h-5 text-blue-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3h18v18H3V3z" /></svg>
                <span class="sidebar-text">Edukasi</span>
            </a>

            <a href="/visualisasi" class="flex items-center space-x-3 px-4 py-2 rounded hover:bg-gray-700 transition-colors {{ Route::is('visualization') ? 'bg-gray-800' : '' }}">
                <svg class="w-5 h-5 text-blue-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20V10M18 20V4M6 20v-4" /></svg>
                <span class="sidebar-text">Visualisasi</span>
            </a>

            <!-- Laporan menu with consistent style -->
            <a href="/laporan" class="flex items-center space-x-3 px-4 py-2 rounded hover:bg-gray-700 transition-colors {{ Route::is('laporan') ? 'bg-gray-800' : '' }}">
                <svg class="w-5 h-5 text-blue-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 4h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2zm3 4h8m-8 4h8m-8 4h4" /></svg>
                <span class="sidebar-text">Laporan</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6 ml-64"> <!-- ml-64 offset for sidebar -->
        @yield('content')
    </div>
</div>
@yield('scripts')
@stack('scripts')
</body>
</html>