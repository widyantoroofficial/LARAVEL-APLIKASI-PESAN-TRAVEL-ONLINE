<?php

namespace App\Http\Controllers\Backend\Admin\Travel;

use App\Http\Controllers\Controller;
use App\Models\JadwalTravel;
use App\Models\OrderTravel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        $travel = JadwalTravel::withCount('pesanan')->get();
        return view('backend.admin.travel.index', compact('travel'));
    }
    public function transaksi()
    {
        $transaksi = OrderTravel::all();
        return view('backend.admin.travel.transaksi', compact('transaksi'));
    }
    public function riwayatOrder($id)
    {
        // Ambil data travel berdasarkan ID, serta pesanan yang terkait
        $travel = JadwalTravel::with('pesanan.user')->findOrFail($id);

        return view('backend.admin.travel.riwayat', compact('travel'));
    }
}
