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
</head>
<body class="bg-slate-900 text-blue-100 font-sans">
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="w-64 bg-slate-800 text-blue-100 p-6 space-y-4">
        <h1 class="text-2xl font-bold text-blue-300">Insomnia Admin</h1>
        <nav class="space-y-2">
            <a href="/dashboard" class="block p-2 rounded hover:bg-blue-700">Dashboard</a>
            <a href="/data-master" class="block p-2 rounded hover:bg-blue-700">Data Master</a>
            <a href="/prediksi" class="block p-2 rounded hover:bg-blue-700">Prediksi</a>
            <a href="/visualisasi" class="block p-2 rounded hover:bg-blue-700">Visualisasi</a>
            <a href="/laporan" class="block p-2 rounded hover:bg-blue-700">Laporan</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        @yield('content')
    </div>
</div>
@yield('scripts')
</body>
</html>