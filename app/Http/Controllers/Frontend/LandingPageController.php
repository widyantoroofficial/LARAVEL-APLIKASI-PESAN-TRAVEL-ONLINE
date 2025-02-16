<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JadwalTravel;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $jadwal = JadwalTravel::all();
        $berangkat = JadwalTravel::all();
        $tujuantravel = JadwalTravel::all();
        return view('frontend.landing-page', compact('berangkat', 'tujuantravel', 'jadwal'));
    }
    public function search(Request $request)
    {
        $this->validate($request, [
            'asal' => 'required',
            'tujuan' => 'required',
            'tanggal' => 'required',
        ], [
            'asal.required' => 'Mohon isi asal',
            'tujuan.required' => 'Mohon isi tujuan',
            'tanggal.required' => 'Mohon isi tanggal',
        ]);
        // Ambil data berdasarkan filter yang dimasukkan
        $jadwal = JadwalTravel::where('asal_travel', 'like', "%{$request->asal}%")
            ->where('tujuan_travel', 'like', "%{$request->tujuan}%")
            ->whereDate('tanggal_travel', $request->tanggal)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $jadwal,
        ]);
    }
}
