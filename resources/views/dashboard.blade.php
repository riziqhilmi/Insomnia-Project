@extends('layouts.app')

@section('content')
<h2 class="text-3xl font-semibold text-blue-300 mb-4">Dashboard</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-slate-700 p-4 rounded shadow">
        <h3 class="text-blue-200 text-xl mb-2">Total Data</h3>
        <p class="text-2xl font-bold text-white">1000</p>
    </div>
    <div class="bg-slate-700 p-4 rounded shadow">
        <h3 class="text-blue-200 text-xl mb-2">Risiko Insomnia</h3>
        <p class="text-2xl font-bold text-white">320</p>
    </div>
    <div class="bg-slate-700 p-4 rounded shadow">
        <h3 class="text-blue-200 text-xl mb-2">Insomnia</h3>
        <p class="text-2xl font-bold text-white">600</p>
    </div>
</div>
@endsection
