<?php

namespace App\Http\Controllers;

use App\Models\PetugasKeamanan;
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
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        // Validation logic if needed
        PetugasKeamanan::create($request->all());
        return redirect()->route('petugas-keamanans.index');
    }

    public function show($id)
    {
        $petugas = PetugasKeamanan::findOrFail($id);
        return view('petugas.show', compact('petugas'));
    }

    public function edit($id)
    {
        $petugas = PetugasKeamanan::findOrFail($id);
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        // Validation logic if needed
        $petugas = PetugasKeamanan::findOrFail($id);
        $petugas->update($request->all());
        return redirect()->route('petugas-keamanans.index');
    }

    public function destroy($id)
    {
        $petugas = PetugasKeamanan::findOrFail($id);
        $petugas->delete();
        return redirect()->route('petugas-keamanans.index');
    }
}
