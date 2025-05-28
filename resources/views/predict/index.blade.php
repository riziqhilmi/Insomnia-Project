@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h1 class="text-2xl font-bold">Hasil Prediksi</h1>
    <a href="{{ route('predict.create') }}" class="mt-2 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Tambah</a>
</div>

@if(session('success'))
    <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
@endif

<div class="bg-gray-800 rounded p-4 shadow text-sm">
    <table class="w-full text-left text-white">
        <thead class="bg-gray-700">
            <tr>
                <th class="p-2">#</th>
                <th class="p-2">User ID</th>
                <th class="p-2">Label</th>
                <th class="p-2">Waktu</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($results as $r)
            <tr class="border-t border-gray-700">
                <td class="p-2">{{ $loop->iteration }}</td>
                <td class="p-2">{{ $r->user_id }}</td>
                <td class="p-2">{{ $r->prediction_label }}</td>
                <td class="p-2">{{ $r->created_at }}</td>
                <td class="p-2 space-x-2">
                    <a href="{{ route('predict.edit', $r->id) }}" class="text-blue-400 hover:underline">Edit</a>
                    <form action="{{ route('predict.destroy', $r->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-400 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-4">Tidak ada data</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">{{ $results->links() }}</div>
</div>
@endsection
