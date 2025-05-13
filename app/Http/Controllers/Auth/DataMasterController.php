<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DataMasterController extends Controller
{
    public function index(Request $request)
    {
        $jsonPath = storage_path('app/public/insomnia_db.prediksi_insomnia.json');

        if (!file_exists($jsonPath)) {
            return view('auth.master', ['dataMaster' => collect()]); // jika file tidak ada
        }

        $data = json_decode(file_get_contents($jsonPath), true);

        // Ubah array ke collection agar bisa dipaginate
        $collection = collect($data);

        // Ambil halaman sekarang dari query string (?page=2 dst)
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Tentukan jumlah data per halaman
        $perPage = 10;

        // Potong data sesuai halaman
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->values();

        // Buat paginator manual
        $paginatedData = new LengthAwarePaginator(
            $currentPageItems,
            $collection->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('auth.master', ['dataMaster' => $paginatedData]);
    }
}