<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\Obat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayats = Riwayat::all();
        return view('Riwayat.index', compact('riwayats'));
    }

    public function create()
    {
        $obats = Obat::all();
        return view('Riwayat.create', compact('obats'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_siswa' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
        'obat_id' => 'nullable|exists:obats,id',
        'tanggal_kadaluarsa' => 'required|date',
    ]);

    if ($request->obat_id) {
        $obat = Obat::find($request->obat_id);

        // Decrease the stock of the selected obat
        if ($obat->stok > 0) {
            $obat->stok -= 1;
            $obat->save();
        } else {
            return redirect()->back()->withErrors(['error' => 'Stok obat tidak mencukupi.']);
        }
    }

    Riwayat::create($request->all());

    return redirect()->route('riwayat.index')
        ->with('success', 'Riwayat created successfully.');
}

    

    public function show(Riwayat $riwayat)
    {
        return view('Riwayat.show', compact('riwayat'));
    }

    public function edit(Riwayat $riwayat)
{
    $obats = Obat::all();
    return view('Riwayat.edit', compact('riwayat', 'obats'));
}

public function update(Request $request, Riwayat $riwayat)
{
    $request->validate([
        'nama_siswa' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
        'obat_id' => 'required|exists:obats,id',
        'tanggal_kadaluarsa' => 'required|date',
    ]);

    // Restore the stock of the old obat
    $oldObat = $riwayat->obat;
    if ($oldObat) {
        $oldObat->stok += 1;
        $oldObat->save();
    }

    $newObat = Obat::find($request->obat_id);

    // Decrease the stock of the new obat
    if ($newObat->stok > 0) {
        $newObat->stok -= 1;
        $newObat->save();
    } else {
        return redirect()->back()->withErrors(['error' => 'Stok obat tidak mencukupi.']);
    }

    $riwayat->update($request->all());

    return redirect()->route('riwayat.index')
        ->with('success', 'Riwayat updated successfully.');
}


    public function destroy(Riwayat $riwayat)
    {
        $riwayat->delete();

        return redirect()->route('riwayat.index')->with('success', 'Riwayat deleted successfully.');
    }
}
