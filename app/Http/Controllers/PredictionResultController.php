<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PredictionResult;

class PredictionResultController extends Controller
{
    public function index()
    {
        $results = PredictionResult::latest()->paginate(10);
        return view('predict.index', compact('results'));
    }

    public function create()
    {
        return view('predict.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'prediction_result' => 'required|integer',
            'prediction_label' => 'required|string',
            'input_json' => 'required|string',
            'mapped_json' => 'required|string',
        ]);

        PredictionResult::create($request->all());
        return redirect()->route('predict.index')->with('success', 'Hasil prediksi berhasil disimpan.');
    }

    public function edit(PredictionResult $predict)
    {
        return view('predict.edit', compact('predict'));
    }

    public function update(Request $request, PredictionResult $predict)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'prediction_result' => 'required|integer',
            'prediction_label' => 'required|string',
            'input_json' => 'required|string',
            'mapped_json' => 'required|string',
        ]);

        $predict->update($request->all());
        return redirect()->route('predict.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(PredictionResult $predict)
    {
        $predict->delete();
        return redirect()->route('predict.index')->with('success', 'Data berhasil dihapus.');
    }
}
