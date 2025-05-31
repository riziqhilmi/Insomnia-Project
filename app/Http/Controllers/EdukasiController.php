<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edukasi;
class EdukasiController extends Controller
{
    public function index()
    {
        $data = Edukasi::latest()->paginate(10);
        return view('edukasi.index', compact('data'));
    }

    public function create()
    {
        return view('edukasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
        ]);

        Edukasi::create($request->all());

        return redirect()->route('edukasi.index')->with('success', 'Konten edukasi berhasil ditambahkan.');
    }

    public function edit(Edukasi $edukasi)
    {
        return view('edukasi.edit', compact('edukasi'));
    }

    public function update(Request $request, Edukasi $edukasi)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
        ]);

        $edukasi->update($request->all());

        return redirect()->route('edukasi.index')->with('success', 'Konten edukasi berhasil diperbarui.');
    }

    public function destroy(Edukasi $edukasi)
    {
        $edukasi->delete();

        return redirect()->route('edukasi.index')->with('success', 'Konten edukasi berhasil dihapus.');
    }

    
}
