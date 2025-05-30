<?php

namespace App\Http\Controllers;

use App\Models\PredictionResult;
use Illuminate\Http\Request;

class VisualController extends Controller
{
    public function index(Request $request)
    {
        $tipe = $request->get('tipe', 'kategori_insomnia');

        // Get all prediction results with mapped data
        $rows = PredictionResult::select('mapped_json', 'prediction_label', 'created_at')->get();

        // Process data for visualization
        $data = $this->processVisualizationData($rows, $tipe);
        
        // Additional data for combo charts
        $insomniaTrends = $this->getInsomniaTrends($rows);
        $sleepQualityDistribution = $this->getSleepQualityDistribution($rows);
        $stressVsSleepHours = $this->getStressVsSleepHours($rows);

        return view('visualisasi.index', [
            'data' => $data['grouped'],
            'tipe' => $tipe,
            'label' => $data['label'],
            'insomniaTrends' => $insomniaTrends,
            'sleepQualityDistribution' => $sleepQualityDistribution,
            'stressVsSleepHours' => $stressVsSleepHours,
        ]);
    }

    private function processVisualizationData($rows, $tipe)
    {
        $data = $rows->map(function ($item) {
            $json = json_decode(str_replace("'", '"', $item->mapped_json), true);
            $json['kategori_insomnia'] = $item->prediction_label;
            $json['created_at'] = $item->created_at;
            return $json;
        });

        $grouped = $data->groupBy($tipe)->map(function ($group, $key) {
            return [
                'value' => $key ?? 'Tidak Diketahui',
                'total' => $group->count()
            ];
        })->values();

        $label = 'Distribusi berdasarkan ' . ucfirst(str_replace('_', ' ', $tipe));

        return [
            'grouped' => $grouped,
            'label' => $label,
            'rawData' => $data
        ];
    }

    private function getInsomniaTrends($rows)
    {
        $data = $rows->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        })->map(function($dailyData) {
            return [
                'date' => $dailyData->first()->created_at->format('M d'),
                'none' => $dailyData->where('prediction_label', 'Tidak ada insomnia')->count(),
                'risk' => $dailyData->where('prediction_label', 'Risiko Insomnia')->count(),
                'insomnia' => $dailyData->where('prediction_label', 'Insomnia')->count()
            ];
        })->sortBy('date')->values();

        return $data;
    }

    private function getSleepQualityDistribution($rows)
    {
        $data = $rows->map(function ($item) {
            $json = json_decode(str_replace("'", '"', $item->mapped_json), true);
            return [
                'quality' => $json['sleep_quality'] ?? 'Unknown',
                'category' => $item->prediction_label
            ];
        });

        $grouped = $data->groupBy('quality')->map(function($group, $quality) {
            return [
                'quality' => $quality,
                'none' => $group->where('category', 'Tidak ada insomnia')->count(),
                'risk' => $group->where('category', 'Risiko Insomnia')->count(),
                'insomnia' => $group->where('category', 'Insomnia')->count()
            ];
        })->values();

        return $grouped;
    }

    private function getStressVsSleepHours($rows)
    {
        $data = $rows->map(function ($item) {
            $json = json_decode(str_replace("'", '"', $item->mapped_json), true);
            return [
                'stress' => $json['stress'] ?? 'Unknown',
                'sleep_hours' => $json['sleep_hours'] ?? 'Unknown',
                'category' => $item->prediction_label
            ];
        });

        return $data;
    }
}