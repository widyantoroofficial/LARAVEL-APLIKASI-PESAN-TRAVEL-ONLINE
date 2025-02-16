<?php

namespace App\Http\Controllers\Backend\Admin\JadwalTravel;

use App\Http\Controllers\Controller;
use App\Models\JadwalTravel;
use Illuminate\Http\Request;

class JadwalTravelController extends Controller
{
    public function index()
    {
        $jadwaltravel = JadwalTravel::all();
        return view('backend.admin.jadwal-travel.index', compact('jadwaltravel'));
    }
    public function tambah(Request $request)
    {
        JadwalTravel::create([
            'nama_travel' => $request->nama_travel,
            'asal_travel' => $request->asal_travel,
            'tujuan_travel' => $request->tujuan_travel,
            'tanggal_travel' => $request->tanggal_travel,
            'jam_travel' => $request->jam_travel,
            'harga_travel' => $request->harga_travel,
            'kuota_travel' => $request->kuota_travel,
        ]);
        return redirect()->route('backend.jadwal-travel.index')->with('success', 'Berhasil Tambah Jadwal Travel');
    }
}
