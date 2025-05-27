<?php

// app/Http/Controllers/Api/PredictionController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prediction;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    public function store(Request $request)
    {
        // Validasi API Key
        if ($request->header('Authorization') !== 'Bearer dev-secret-key-123') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $data = $request->validate([
            'user_input' => 'required|array',
            'prediction_result' => 'required|array',
        ]);

        $prediction = Prediction::create([
            'user_input' => $data['user_input'],
            'prediction_level' => $data['prediction_result']['prediction'],
            'prediction_result' => $data['prediction_result']['result']
        ]);

        return response()->json($prediction, 201);
    }

    public function index()
    {
        $predictions = Prediction::latest()->paginate(10);
        return response()->json($predictions);
    }
}
