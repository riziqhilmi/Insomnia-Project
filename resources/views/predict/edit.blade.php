@extends('layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Hasil Prediksi</h1>

<form action="{{ route('predict.update', $predict->id) }}" method="POST" class="bg-gray-800 p-4 rounded space-y-4">
    @csrf
    @method('PUT')

    @foreach(['user_id', 'prediction_result', 'prediction_label', 'input_json', 'mapped_json'] as $field)
        <div>
            <label class="block mb-1 capitalize">{{ str_replace('_', ' ', $field) }}</label>
            @if(str_contains($field, 'json'))
                <textarea name="{{ $field }}" class="w-full rounded p-2 bg-gray-900 text-white" rows="4">{{ old($field, $predict->$field) }}</textarea>
            @else
                <input type="{{ is_numeric(old($field, $predict->$field)) ? 'number' : 'text' }}" name="{{ $field }}" class="w-full rounded p-2 bg-gray-900 text-white" value="{{ old($field, $predict->$field) }}">
            @endif
            @error($field) <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
        </div>
    @endforeach

    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
    <a href="{{ route('predict.index') }}" class="ml-2 text-gray-300 hover:underline">Batal</a>
</form>
@endsection
