<?php
namespace App\Http\Controllers;

use App\Models\KetuaRw;
use App\Models\Perumahan;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KetuaRwController extends Controller
{
    public function index()
    {
        $ketuaRw = KetuaRw::all();
        return view('ketuarw.index', compact('ketuaRws'));
    }

    public function create()
    {
        $perumahans = Perumahan::all();
        return view('ketuarw.create', compact('perumahans'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ketua_rw' => 'required|string|max:255',
            'telepon_ketua_rw' => 'required|numeric',
            'id_perumahan' => 'required|exists:perumahans,id_perumahan',
        ]);

        KetuaRw::create($validatedData);

        return redirect()->route('ketuarw.index')->with('success', 'Ketua RW berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ketuaRw = KetuaRw::findOrFail($id);
        $perumahans = Perumahan::all();
        return view('ketuarw.edit', compact('ketuaRw', 'perumahans'));
    }

    public function update(Request $request, $id)
    {
        $ketuaRw = KetuaRw::findOrFail($id);

        $validatedData = $request->validate([
            'nama_ketua_rw' => 'required|string|max:255',
            'telepon_ketua_rw' => 'required|numeric',
            'id_perumahan' => 'required|exists:perumahans,id_perumahan',
        ]);

        $ketuaRw->update($validatedData);

        return redirect()->route('ketuarw.index')->with('success', 'Ketua RW berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ketuaRw = KetuaRw::findOrFail($id);
        $ketuaRw->delete();
        return redirect()->route('ketuarw.index')->with('success', 'Ketua RW berhasil dihapus.');
    }
}
