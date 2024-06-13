<?php

namespace App\Http\Controllers;

use App\Models\KetuaRw;
use App\Models\Perumahan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KetuaRwController extends Controller
{
    public function index()
    {
        $ketuaRws = KetuaRw::all();
        return view('ketuarw.index', compact('ketuaRws'));
    }

    public function create()
    {
        $perumahans = Perumahan::all();
        return view('ketuarw.create', compact('perumahans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ketua_rw' => 'required|string|max:255',
            'telepon_ketua_rw' => 'required|numeric',
            'id_perumahan' => 'required|exists:perumahans,id_perumahan',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Simpan data Ketua RW
        $ketuaRw = KetuaRw::create([
            'nama_ketua_rw' => $request->nama_ketua_rw,
            'telepon_ketua_rw' => $request->telepon_ketua_rw,
            'id_perumahan' => $request->id_perumahan,
        ]);

        // Simpan data User sebagai Ketua RW
        $user = new User();
        $user->name = $request->nama_ketua_rw;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 2; // Role 2 untuk Ketua RW
        $user->save();

        return redirect()->route('ketuarw.index')->with('success', 'Ketua RW dan akun pengguna berhasil ditambahkan.');
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

        $request->validate([
            'nama_ketua_rw' => 'required|string|max:255',
            'telepon_ketua_rw' => 'required|numeric',
            'id_perumahan' => 'required|exists:perumahans,id_perumahan',
        ]);

        $ketuaRw->update([
            'nama_ketua_rw' => $request->nama_ketua_rw,
            'telepon_ketua_rw' => $request->telepon_ketua_rw,
            'id_perumahan' => $request->id_perumahan,
        ]);

        // Update data User (opsional, tergantung kebutuhan aplikasi)

        return redirect()->route('ketuarw.index')->with('success', 'Ketua RW berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ketuaRw = KetuaRw::findOrFail($id);
        $ketuaRw->delete();

        // Hapus juga User terkait jika diperlukan

        return redirect()->route('ketuarw.index')->with('success', 'Ketua RW berhasil dihapus.');
    }
}
