<?php

namespace App\Http\Controllers;
use App\Models\DataMahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total = DataMahasiswa::count();
        $tidak = DataMahasiswa::where('kategori_insomnia', 0)->count();
        $risiko = DataMahasiswa::whereIn('kategori_insomnia', [1])->count();
        $insomnia = DataMahasiswa::where('kategori_insomnia', 2)->count();

        return view('dashboard', compact('total', 'tidak', 'risiko', 'insomnia'));
    }
}
