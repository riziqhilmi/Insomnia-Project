@php use Illuminate\Support\Facades\Route; @endphp

<!-- Toggle Sidebar Button (di luar sidebar) -->
<button id="toggle-btn" onclick="toggleSidebar(event)"
    class="fixed top-1/2 transform -translate-y-1/2 bg-gray-900 text-white p-2 rounded-full shadow-lg focus:outline-none z-50 transition-all duration-300">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
</button>

<!-- Sidebar -->
<div id="sidebar" class="fixed inset-y-0 left-0 bg-gradient-to-b from-gray-900 to-gray-800 text-white shadow-lg z-40 w-64 transition-all duration-300 flex flex-col">
    <div class="p-4 text-2xl font-extrabold text-blue-400 border-b border-gray-700">
        <span id="brand-text" class="transition-all duration-300">INSOMNIC</span>
    </div>

    <nav class="p-4 space-y-2 flex-1">
        <a href="{{ route('dashboard') }}"
           class="flex items-center space-x-3 px-4 py-2 rounded hover:bg-gray-700 transition-colors {{ Route::is('dashboard') ? 'bg-gray-800' : '' }}">
            <svg class="w-5 h-5 text-blue-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4" /></svg>
                 <span class="sidebar-text transition-opacity duration-300 opacity-100">Dashboard</span>
        </a>
        <a href="{{ route('master') }}"
           class="flex items-center space-x-3 px-4 py-2 rounded hover:bg-gray-700 transition-colors {{ Route::is('master') ? 'bg-gray-800' : '' }}">
            <svg class="w-5 h-5 text-blue-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24"><path d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>
            <span class="sidebar-text">Data Master</span>
        </a>
        <a href="{{ route('predision') }}"
           class="flex items-center space-x-3 px-4 py-2 rounded hover:bg-gray-700 transition-colors {{ Route::is('predision') ? 'bg-gray-800' : '' }}">
            <svg class="w-5 h-5 text-blue-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24"><path d="M3 3h18v18H3V3z" /></svg>
            <span class="sidebar-text">Predision</span>
        </a>
        <a href="{{ route('visualization') }}"
           class="flex items-center space-x-3 px-4 py-2 rounded hover:bg-gray-700 transition-colors {{ Route::is('visualization') ? 'bg-gray-800' : '' }}">
            <svg class="w-5 h-5 text-blue-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24"><path d="M12 20V10M18 20V4M6 20v-4" /></svg>
            <span class="sidebar-text">Visualisasi</span>
        </a>
    </nav>
</div>

<script>
let isTransitioning = false;
let sidebarIsOpen = true; // default terbuka

function toggleSidebar(event) {
    if (isTransitioning) return;
    if (!event || !event.currentTarget.matches('#toggle-btn')) return;

    isTransitioning = true;
    sidebarIsOpen = !sidebarIsOpen;
    localStorage.setItem('sidebarIsOpen', sidebarIsOpen);

    applySidebarState();
    setTimeout(() => isTransitioning = false, 350);
}

function applySidebarState() {
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('main-content');
    const navbar = document.getElementById('navbar');
    const texts = document.querySelectorAll('.sidebar-text');
    const brandText = document.getElementById('brand-text');

    const isOpen = sidebarIsOpen;

    sidebar.classList.toggle('w-64', isOpen);
    sidebar.classList.toggle('w-20', !isOpen);

    content?.classList.toggle('ml-64', isOpen);
    content?.classList.toggle('ml-20', !isOpen);
    navbar?.classList.toggle('ml-64', isOpen);
    navbar?.classList.toggle('ml-20', !isOpen);

    brandText.textContent = isOpen ? 'INSOMNIC' : 'IMC';

    texts.forEach(el => {
        if (!isOpen) {
            el.classList.add('opacity-0');
            setTimeout(() => el.classList.add('hidden'), 150);
        } else {
            el.classList.remove('hidden');
            setTimeout(() => el.classList.remove('opacity-0'), 10);
        }
        const toggleBtn = document.getElementById('toggle-btn');
if (toggleBtn) {
    toggleBtn.style.left = isOpen ? '244px' : '68px';
}
    });
}

window.onload = function() {
    sidebarIsOpen = localStorage.getItem('sidebarIsOpen') === 'true';
    applySidebarState();
};
</script>

<style>
    #toggle-btn {
    z-index: 50; /* lebih tinggi dari z-index: 0 pada ::before dan z-index: 40 pada #sidebar */
}

/* Efek bintang */
#sidebar::before {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: transparent url('data:image/svg+xml;utf8,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="2" cy="2" r="1" fill="white" opacity="0.8"/><circle cx="30" cy="50" r="1.2" fill="white" opacity="0.7"/><circle cx="70" cy="80" r="1" fill="white" opacity="0.6"/></svg>') repeat;
    animation: starfield 60s linear infinite;
    z-index: 0;
    opacity: 0.3;
    pointer-events: none;
}

/* Animasi gerak bintang */
@keyframes starfield {
    0% { background-position: 0 0; }
    100% { background-position: -1000px 1000px; }
}

/* Pastikan konten sidebar tetap di atas */
#sidebar > * {
    overflow: visible;
    position: relative;
    z-index: 1;
}
</style>
