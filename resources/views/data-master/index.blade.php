@extends('layouts.app')

@section('content')
<div id="main-content" class="relative transition-all duration-300 min-h-screen bg-gray-900 py-12 px-8 text-white">
    <div class="mb-4">
        <h2 class="text-2xl font-semibold text-blue-200 mb-2">Data Master</h2>

        {{-- Search Bar & Tambah Data --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-2 md:space-y-0">
            <form action="{{ route('data-master.index') }}" method="GET" class="flex items-center">
                <input type="text" name="search" placeholder="Cari data..." value="{{ request('search') }}"
                    class="w-64 px-4 py-2 rounded-l bg-slate-800 text-white border-t border-b border-l border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r border border-blue-600">
                    Cari
                </button>
            </form>

            <a href="{{ route('data-master.create') }}"
               class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded shadow transition duration-200">
                Tambah Data
            </a>
        </div>
    </div>

    <div class="overflow-x-auto rounded-lg shadow-lg mt-6">
        <table class="w-full table-auto text-sm text-left text-blue-100">
            <thead class="text-xs uppercase bg-slate-700 text-blue-300">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Tahun Akademik</th>
                    <th class="px-6 py-3">Jenis Kelamin</th>
                    <th class="px-6 py-3">Kategori Insomnia</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-slate-800 divide-y divide-slate-700">
            @foreach ($data as $index => $item)
                <tr class="hover:bg-slate-700 transition duration-200">
                    <td class="px-6 py-4">{{ $data->firstItem() + $index }}</td>
                    <td class="px-6 py-4">{{ $item->tahun_akademik }}</td>
                    <td class="px-6 py-4">{{ $item->jenis_kelamin }}</td>
                    <td class="px-6 py-4">{{ $item->kategori_insomnia }}</td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-4">
                            <a href="{{ route('data-master.show', $item) }}" class="text-blue-400 hover:text-blue-300" title="Lihat">
                                👁️
                            </a>
                            <a href="{{ route('data-master.edit', $item) }}" class="text-yellow-400 hover:text-yellow-300" title="Edit">
                                ✏️
                            </a>
                            <form action="{{ route('data-master.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus data ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400" title="Hapus">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6 flex flex-col items-center text-white space-y-2">
        <div>
            {{ $data->withQueryString()->links() }}
        </div>
        <div class="text-sm text-blue-300">
            Menampilkan {{ $data->firstItem() }} sampai {{ $data->lastItem() }} dari total {{ $data->total() }} data
        </div>
    </div>
</div>
@endsection