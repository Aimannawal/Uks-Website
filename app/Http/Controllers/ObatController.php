<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
    
        $obats = Obat::when($search, function ($query, $search) {
                return $query->where('nama_obat', 'like', "%{$search}%")
                             ->orWhere('deskripsi_obat', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc') // Optional: to ensure results are sorted
            ->paginate(10);
    
        return view('obats.index', compact('obats', 'search'));
    }
    

    public function create()
    {
        return view('obats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'deskripsi_obat' => 'nullable|string',
            'stok' => 'required|integer',
            'tanggal_kadaluarsa' => 'required|date',
            'foto_obat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // tambahkan validasi untuk foto obat
        ]);

        $input = $request->all();

        if ($request->hasFile('foto_obat')) {
            $foto_obat = $request->file('foto_obat');
            $nama_foto = time() . '_' . $foto_obat->getClientOriginalName();
            $foto_obat->move(public_path('images'), $nama_foto);
            $input['foto_obat'] = '/images/' . $nama_foto;
        }

        Obat::create($input);

        return redirect()->route('obats.index')
                         ->with('success', 'Obat created successfully.');
    }

    public function show($id)
    {
        $obat = Obat::find($id);
        return view('obats.show', compact('obat'));
    }

    public function edit($id)
    {
        $obat = Obat::find($id);
        return view('obats.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'deskripsi_obat' => 'nullable|string',
            'stok' => 'required|integer',
            'tanggal_kadaluarsa' => 'required|date',
            'foto_obat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // tambahkan validasi untuk foto obat
        ]);

        $obat = Obat::find($id);
        $input = $request->all();

        if ($request->hasFile('foto_obat')) {
            $foto_obat = $request->file('foto_obat');
            $nama_foto = time() . '_' . $foto_obat->getClientOriginalName();
            $foto_obat->move(public_path('images'), $nama_foto);
            $input['foto_obat'] = '/images/' . $nama_foto;
        }

        $obat->update($input);

        return redirect()->route('obats.index')
                         ->with('success', 'Obat updated successfully');
    }

    public function destroy($id)
    {
        Obat::destroy($id);

        return redirect()->route('obats.index')
                         ->with('success', 'Obat deleted successfully');
    }
}
