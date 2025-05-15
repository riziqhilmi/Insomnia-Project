<?php

namespace App\Http\Controllers;

use App\Models\DataMahasiswa;
use Illuminate\Http\Request;

class DataMahasiswaController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
{
    $query = DataMahasiswa::query();

    if ($request->has('search')) {
        $search = $request->search;
        $query->where('tahun_akademik', 'like', "%$search%")
              ->orWhere('jenis_kelamin', 'like', "%$search%")
              ->orWhere('kategori_insomnia', 'like', "%$search%");
    }

    $data = $query->paginate(10); // paginate 10 per halaman

    return view('data-master.index', compact('data'));
}

    // Tampilkan form tambah data
    public function create()
    {
        return view('data-master.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'tahun_akademik' => 'required',
            'jenis_kelamin' => 'required',
            'lama_tidur' => 'required',
            'kesulitan_konsentrasi' => 'required',
            'ketidakhadiran_kuliah' => 'required',
            'penggunaan_perangkat' => 'required',
            'konsumsi_kafein' => 'required',
            'aktivitas_olahraga' => 'required',
            'tingkat_stres' => 'required',
            'performa_akademik' => 'required',
            'kategori_insomnia' => 'required',
        ]);

        DataMahasiswa::create($request->all());

        return redirect()->route('data-master.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit(DataMahasiswa $dataMahasiswa)
    {
        return view('data-master.edit', compact('dataMahasiswa'));
    }

    // Update data
    public function update(Request $request, DataMahasiswa $dataMahasiswa)
    {
        $request->validate([
            'tahun_akademik' => 'required',
            'jenis_kelamin' => 'required',
            'lama_tidur' => 'required',
            'kesulitan_konsentrasi' => 'required',
            'ketidakhadiran_kuliah' => 'required',
            'penggunaan_perangkat' => 'required',
            'konsumsi_kafein' => 'required',
            'aktivitas_olahraga' => 'required',
            'tingkat_stres' => 'required',
            'performa_akademik' => 'required',
            'kategori_insomnia' => 'required',
        ]);

        $dataMahasiswa->update($request->all());

        return redirect()->route('data-master.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy(DataMahasiswa $dataMahasiswa)
    {
        $dataMahasiswa->delete();

        return redirect()->route('data-master.index')->with('success', 'Data berhasil dihapus.');
    }
    public function show(DataMahasiswa $dataMahasiswa)
{
    return view('data-master.show', compact('dataMahasiswa'));
}

}
