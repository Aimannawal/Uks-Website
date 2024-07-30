<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class MintaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obats = Obat::all();
        return view('pengajuan', compact('obats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengajuans = Pengajuan::all();
        return view('pengajuan', compact('pengajuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'obat_id' => 'nullable|exists:obats,id',
        ]);

        if ($request->input('obat_id')) {
            $obat = Obat::find($request->input('obat_id'));

            if ($obat && $obat->stok > 0) {
                $obat->stok -= 1;
                $obat->save();
            } else {
                return redirect()->back()->withErrors(['error' => 'Stok obat tidak mencukupi.']);
            }
        }

        // Create a new Pengajuan record
        Pengajuan::create($validatedData);

        // Send WhatsApp message
        $this->sendWhatsAppMessage($request);

        return redirect()->route('Mengajukan.index')->with('success', 'Pengajuan created successfully.');
    }

    private function sendWhatsAppMessage(Request $request)
    {
        $obatName = '';
        if ($request->input('obat_id')) {
            $obat = Obat::find($request->input('obat_id'));
            if ($obat) {
                $obatName = $obat->nama_obat; 
            }
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'target' => '', 
                // 'target' => '085173034717', 
                'message' => 'Nama Siswa: ' . $request->input('nama') . "\n" .
                             'Kelas Siswa: ' . $request->input('kelas') . "\n" .
                             'Keterangan: ' . $request->input('keterangan') . "\n" .
                             'Obat: ' . ($obatName ?: 'Tidak ada obat'),
                'countryCode' => '62', 
            )),
            CURLOPT_HTTPHEADER => array(
                'Authorization: S5zwcsapCht2HScYhCjv', 
                'Content-Type: application/x-www-form-urlencoded',
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        // Optional: Log the response
        // Log::info($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
