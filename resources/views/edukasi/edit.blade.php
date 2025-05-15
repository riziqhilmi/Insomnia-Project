
@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-blue-900 text-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Edit Edukasi</h2>

    <form action="{{ route('edukasi.update', $edukasi->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="judul" class="block text-sm font-medium">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $edukasi->judul) }}" required class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2">
        </div>

        <div>
            <label for="konten" class="block text-sm font-medium">Konten</label>
            <textarea name="konten" id="konten" rows="6" required class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2">{{ old('konten', $edukasi->konten) }}</textarea>
        </div>

        <div>
            <label for="kategori" class="block text-sm font-medium">Kategori</label>
            <input type="text" name="kategori" id="kategori" value="{{ old('kategori', $edukasi->kategori) }}" required class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2">
        </div>

        <div>
            <label for="sumber" class="block text-sm font-medium">Sumber (opsional)</label>
            <input type="text" name="sumber" id="sumber" value="{{ old('sumber', $edukasi->sumber) }}" class="mt-1 w-full rounded-md bg-blue-800 border border-blue-700 p-2">
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
            Update
        </button>
    </form>
</div>
@endsection
