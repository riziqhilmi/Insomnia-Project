<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PredictionResult;

class DashboardController extends Controller
{
    public function index()
    {
        $total = PredictionResult::count();
        $tidak = PredictionResult::where('prediction_label', 'Tidak ada insomnia')->count();
        $risiko = PredictionResult::where('prediction_label', 'Risiko Insomnia')->count();
        $insomnia = PredictionResult::where('prediction_label', 'Insomnia')->count();

        $recent = PredictionResult::latest()->take(5)->get();

        return view('dashboard', compact('total', 'tidak', 'risiko', 'insomnia', 'recent'));
    }
}
