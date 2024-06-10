<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perumahan;

class PerumahanController extends Controller
{
    public function index()
    {
        $perumahans = Perumahan::all();
        return view('perumahan.index', compact('perumahans'));
    }

    public function create()
    {
        return view('perumahan.create');
    }

    public function store(Request $request)
    {
        Perumahan::create($request->all());
        return redirect()->route('perumahan.index');
    }

    public function edit($id_perumahan)
    {
        $perumahan = Perumahan::find($id_perumahan);
        if (!$perumahan) {
            return redirect()->route('perumahan.index')->with('error', 'Perumahan not found');
        }
        return view('perumahan.edit', compact('perumahan'));
    }

    public function update(Request $request, $id_perumahan)
    {
        $perumahan = Perumahan::find($id_perumahan);
        if (!$perumahan) {
            return redirect()->route('perumahan.index')->with('error', 'Perumahan not found');
        }
        $perumahan->update($request->all());
        return redirect()->route('perumahan.index');
    }

    public function destroy($id_perumahan)
    {
        $perumahan = Perumahan::find($id_perumahan);
        if ($perumahan) {
            $perumahan->delete();
        } else {
            return redirect()->route('perumahan.index')->with('error', 'Perumahan not found');
        }
        return redirect()->route('perumahan.index');
    }
}
