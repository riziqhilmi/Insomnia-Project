<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMahasiswa;
class VisualController extends Controller
{
    public function index(Request $request)
    {
        $tipe = $request->get('tipe', 'kategori_insomnia');

        switch ($tipe) {
            case 'jenis_kelamin':
                $data = DataMahasiswa::select('jenis_kelamin', \DB::raw('count(*) as total'))
                    ->groupBy('jenis_kelamin')
                    ->get();
                $label = 'Jenis Kelamin';
                break;

            case 'tahun_akademik':
                $data = DataMahasiswa::select('tahun_akademik', \DB::raw('count(*) as total'))
                    ->groupBy('tahun_akademik')
                    ->get();
                $label = 'Tahun Akademik';
                break;

            case 'lama_tidur':
                $data = DataMahasiswa::select('lama_tidur', \DB::raw('count(*) as total'))
                    ->groupBy('lama_tidur')
                    ->get();
                $label = 'Lama Tidur';
                break;

            case 'tingkat_stres':
                $data = DataMahasiswa::select('tingkat_stres', \DB::raw('count(*) as total'))
                    ->groupBy('tingkat_stres')
                    ->get();
                $label = 'Tingkat Stres';
                break;

            case 'kategori_insomnia':
            default:
                $data = DataMahasiswa::select('kategori_insomnia', \DB::raw('count(*) as total'))
                    ->groupBy('kategori_insomnia')
                    ->get();
                $label = 'Kategori Insomnia';
                break;
        }

        return view('visualisasi.index', [
            'data' => $data,
            'tipe' => $tipe,
            'label' => $label
        ]);
    }
}
