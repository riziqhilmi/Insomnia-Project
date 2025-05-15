@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h2 class="text-2xl font-semibold text-blue-200">Konten Edukasi</h2>
    <a href="{{ route('edukasi.create') }}" class="mt-2 inline-block bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded">
        Tambah Konten
    </a>
</div>

@if(session('success'))
    <div class="bg-green-600 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto">
    <table class="w-full mt-4 table-auto border-collapse border border-blue-500 text-blue-100">
        <thead class="bg-slate-700">
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Kategori</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
            <tr class="hover:bg-slate-800">
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $item->judul }}</td>
                <td class="border px-4 py-2">{{ $item->kategori }}</td>
                <td class="border px-4 py-2 flex space-x-2">
                    <a href="{{ route('edukasi.edit', $item->id) }}" class="text-yellow-400 hover:underline">Edit</a>
                    <form action="{{ route('edukasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus konten ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
