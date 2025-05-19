@extends('layouts.app')

@section('content')
<div id="main-content" class="relative transition-all duration-300 min-h-screen bg-gray-900 py-12 px-8 text-white">
    <div class="mb-4 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-blue-200">Data Master</h2>
        <a href="{{ route('data-master.create') }}" class="mt-2 inline-block bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded">
            Tambah Data
        </a>
    </div>

    {{-- Search Bar --}}
    <form action="{{ route('data-master.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" placeholder="Cari data..." value="{{ request('search') }}"
               class="px-4 py-2 rounded bg-slate-800 text-white border border-blue-500 focus:outline-none focus:ring focus:border-blue-300" />
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded ml-2">
            Cari
        </button>
    </form>

    <div class="overflow-x-auto">
        <table class="w-full mt-4 table-auto border-collapse border border-blue-500 text-blue-100">
            <thead class="bg-slate-700">
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Tahun Akademik</th>
                    <th class="border px-4 py-2">Jenis Kelamin</th>
                    <th class="border px-4 py-2">Kategori Insomnia</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $index => $item)
                <tr class="hover:bg-slate-800">
                    <td class="border px-4 py-2">{{ $data->firstItem() + $index }}</td>
                    <td class="border px-4 py-2">{{ $item->tahun_akademik }}</td>
                    <td class="border px-4 py-2">{{ $item->jenis_kelamin }}</td>
                    <td class="border px-4 py-2">{{ $item->kategori_insomnia }}</td>
                    <td class="border px-4 py-2 flex space-x-2">
                        <a href="{{ route('data-master.show', $item) }}" class="text-blue-400 hover:underline">Lihat</a>
                        <a href="{{ route('data-master.edit', $item) }}" class="text-yellow-400 hover:underline">Edit</a>
                        <form action="{{ route('data-master.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
<div class="mt-4 flex flex-col items-center text-white space-y-2">
    <div>
        {{ $data->withQueryString()->links() }}
    </div>
    <div class="text-sm text-blue-300">
        Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} results
    </div>
</div>
    </div>
    </div>
@endsection
