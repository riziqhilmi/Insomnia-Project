<x-app-layout>
    @include('auth.sidebar') {{-- Sidebar fixed kiri --}}

    @include('layouts.navigation') {{-- Navbar di atas konten utama, geser kanan pakai ml-64 --}}

    <div class="ml-64 min-h-screen bg-gray-900 py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200">
                    <h3 class="text-2xl font-bold text-blue-400 mb-4">
                        Welcome, {{ Auth::user()->name }}!
                    </h3>
                    <p class="text-gray-300">
                        You're logged in to <span class="font-semibold">Insomnic</span>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
