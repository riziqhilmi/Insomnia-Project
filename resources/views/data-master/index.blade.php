@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h2 class="text-2xl font-semibold text-blue-200">Data Mahasiswa</h2>
        <a href="{{ route('data-master.create') }}" class="mt-2 inline-block bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded">
            Tambah Data
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full mt-4 table-auto border-collapse border border-blue-500 text-blue-100">
            <thead class="bg-slate-700">
                <tr>
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Tahun Akademik</th>
                    <th class="border px-4 py-2">Jenis Kelamin</th>
                    <th class="border px-4 py-2">Kategori Insomnia</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $index => $item)
<tr class="hover:bg-slate-800">
    <td class="border px-4 py-2">{{ $index + 1 }}</td>
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
    </div>
@endsection
