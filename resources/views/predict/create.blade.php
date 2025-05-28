@extends('layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Hasil Prediksi</h1>

<form action="{{ route('predict.store') }}" method="POST" class="bg-gray-800 p-4 rounded space-y-4">
    @csrf

    @foreach(['user_id', 'prediction_result', 'prediction_label', 'input_json', 'mapped_json'] as $field)
        <div>
            <label class="block mb-1 capitalize">{{ str_replace('_', ' ', $field) }}</label>
            @if(str_contains($field, 'json'))
                <textarea name="{{ $field }}" class="w-full rounded p-2 bg-gray-900 text-white" rows="4">{{ old($field) }}</textarea>
            @else
                <input type="{{ is_numeric(old($field)) ? 'number' : 'text' }}" name="{{ $field }}" class="w-full rounded p-2 bg-gray-900 text-white" value="{{ old($field) }}">
            @endif
            @error($field) <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
        </div>
    @endforeach

    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
    <a href="{{ route('predict.index') }}" class="ml-2 text-gray-300 hover:underline">Batal</a>
</form>
@endsection
