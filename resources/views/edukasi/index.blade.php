@extends('layouts.app')

@section('content')
<div id="main-content" class="relative transition-all duration-300 min-h-screen bg-gray-900 py-12 px-8 text-white">
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-blue-200">Konten Edukasi</h2>
        <a href="{{ route('edukasi.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            + Tambah Konten
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-600 text-white p-3 rounded mb-4 shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg shadow-lg">
        <table class="min-w-full text-sm text-blue-100">
            <thead class="bg-gray-800 uppercase text-xs text-blue-300">
                <tr>
                    <th class="px-6 py-3 text-left">#</th>
                    <th class="px-6 py-3 text-left">Judul</th>
                    <th class="px-6 py-3 text-left">Kategori</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-gray-700 divide-y divide-gray-600">
                @foreach ($data as $index => $item)
                    <tr class="hover:bg-gray-600 transition">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $item->judul }}</td>
                        <td class="px-6 py-4">{{ $item->kategori }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('edukasi.edit', $item->id) }}"
                               class="text-yellow-400 hover:text-yellow-300 transition" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 5h2M15.5 9.5l-6 6m-1.5 1.5H6v-2.5l6-6 2.5 2.5z"/>
                                </svg>
                            </a>
                            <form action="{{ route('edukasi.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus konten ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 transition" title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection