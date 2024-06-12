<?php

namespace App\Http\Controllers;

use App\Models\PetugasKeamanan;
use App\Models\Perumahan;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:pria,wanita',
            'telepon' => 'nullable|numeric',
            'nik' => ['required', 'size:16', Rule::unique('petugas_keamanans')->whereNull('deleted_at')],
            'id_perumahan' => 'required|exists:perumahans,id_perumahan',
            'sk_satpam' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Handle file upload
        if ($request->hasFile('sk_satpam')) {
            $file = $request->file('sk_satpam');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('sk_satpam', $fileName, 'public');
            $validatedData['sk_satpam'] = $fileName; // Save the file name to the database
        }

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
    // Validasi data yang dikirimkan oleh pengguna
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'nullable|string|max:255',
        'tanggal_lahir' => 'nullable|date',
        'jenis_kelamin' => 'nullable|in:pria,wanita',
        'telepon' => 'nullable|numeric',
        'nik' => ['required', 'size:16', Rule::unique('petugas_keamanans')->ignore($id, 'id_petugas_keamanan')->whereNull('deleted_at')],
        'id_perumahan' => 'required|exists:perumahans,id_perumahan',
        'sk_satpam' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        // tambahkan validasi lainnya sesuai kebutuhan
    ]);

    // Ambil data petugas keamanan berdasarkan id
    $petugas = PetugasKeamanan::findOrFail($id);

    // Handle file upload if a new file is uploaded
    if ($request->hasFile('sk_satpam')) {
        // Delete the old file if it exists
        if ($petugas->sk_satpam) {
            Storage::delete('public/sk_satpam/' . $petugas->sk_satpam);
        }

        $file = $request->file('sk_satpam');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/sk_satpam', $fileName);
        $validatedData['sk_satpam'] = $fileName; // Save the file name to the database
    }

    // Update data petugas keamanan
    $petugas->update($validatedData);

    // Redirect ke halaman index atau ke halaman lain yang sesuai
    return redirect()->route('petugas.index')->with('success', 'Petugas keamanan berhasil diperbarui.');
}



    public function destroy($id)
    {
        $petugas = PetugasKeamanan::findOrFail($id);
        $petugas->delete();
        return redirect()->route('petugas.index');
    }
}
