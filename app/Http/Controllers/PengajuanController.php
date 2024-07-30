<?php 

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with('obat')->orderBy('created_at', 'desc')->get();
        return view('pengajuan.index', compact('pengajuans'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       //
    }

    public function show(Pengajuan $pengajuan)
    {
        return view('pengajuan.show', compact('pengajuan'));
    }

    public function edit(Pengajuan $pengajuan)
    {
        return view('pengajuan.edit', compact('pengajuan'));
    }

    public function update(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'obat_id' => 'nullable|exists:obats,id',
            'keterangan' => 'required',
        ]);

        $pengajuan->update($request->all());

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan updated successfully.');
    }

    public function destroy(Pengajuan $pengajuan)
    {
        $pengajuan->delete();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan deleted successfully.');
    }
}
