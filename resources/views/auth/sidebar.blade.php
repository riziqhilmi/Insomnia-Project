@php use Illuminate\Support\Facades\Route; @endphp

<div class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white shadow-lg z-40">
    <div class="p-4 text-2xl font-extrabold text-blue-400 border-b border-gray-700">
        <span class="text-white">INSOMNIC</span>
    </div>
    <nav class="p-4 space-y-2">
        <a href="{{ route('dashboard') }}"
           class="flex items-center px-4 py-2 rounded hover:bg-gray-700 transition-colors {{ Route::is('dashboard') ? 'bg-gray-800' : '' }}">
            <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4" /></svg>
            Dashboard
        </a>
        <a href="{{ route('master') }}"
           class="flex items-center px-4 py-2 rounded hover:bg-gray-700 transition-colors {{ Route::is('master') ? 'bg-gray-800' : '' }}">
            <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24"><path d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>
            Data Master
        </a>
        <a href="{{ route('predision') }}"
           class="flex items-center px-4 py-2 rounded hover:bg-gray-700 transition-colors {{ Route::is('predision') ? 'bg-gray-800' : '' }}">
            <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24"><path d="M3 3h18v18H3V3z" /></svg>
            Predision
        </a>
        <a href="{{ route('visualization') }}"
           class="flex items-center px-4 py-2 rounded hover:bg-gray-700 transition-colors {{ Route::is('visualization') ? 'bg-gray-800' : '' }}">
            <svg class="w-5 h-5 mr-3 text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24"><path d="M12 20V10M18 20V4M6 20v-4" /></svg>
            Visualisasi
        </a>
    </nav>
</div>
