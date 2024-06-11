<?php

namespace App\Http\Controllers;

use App\Models\PetugasKeamanan;
use App\Models\Perumahan;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class PetugasKeamananController extends Controller
{
    public function index()
    {
        $petugas = PetugasKeamanan::all();
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        $perumahans = Perumahan::all();
        return view('petugas.create', compact('perumahans'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan oleh pengguna
        $validatedData = $request->validate([
            'nik' => ['required', 'size:16', Rule::unique('petugas_keamanans')->whereNull('deleted_at')],
            'id_perumahan' => 'required|exists:perumahans,id_perumahan',
            'sk_satpam' => 'nullable|string|max:255',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Lakukan penyimpanan data ke database
        PetugasKeamanan::create($validatedData);

        // Redirect ke halaman index atau ke halaman lain yang sesuai
        return redirect()->route('petugas.index')->with('success', 'Petugas keamanan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $petugas = PetugasKeamanan::findOrFail($id);
        return view('petugas.show', compact('petugas'));
    }

    public function edit($id)
    {
        $petugas = PetugasKeamanan::findOrFail($id);
        $perumahans = Perumahan::all(); // Ambil semua perumahan dari model Perumahan

        return view('petugas.edit', compact('petugas', 'perumahans'));
    }

    public function update(Request $request, $id)
    {
        // Validation logic if needed
        $petugas = PetugasKeamanan::findOrFail($id);
        $petugas->update($request->all());
        return redirect()->route('petugas.index');
    }

    public function destroy($id)
    {
        $petugas = PetugasKeamanan::findOrFail($id);
        $petugas->delete();
        return redirect()->route('petugas.index');
    }
}
