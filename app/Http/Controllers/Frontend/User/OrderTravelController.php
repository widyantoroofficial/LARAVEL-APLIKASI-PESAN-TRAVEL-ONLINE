<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\JadwalTravel;
use App\Models\OrderTravel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Str;

class OrderTravelController extends Controller
{
    public function Order_detail($id)
    {
        $order = JadwalTravel::find($id);
        return view('frontend.user.order.detail', compact('order'));
    }
    public function order_travel(Request $request)
    {
        // Validasi request
        $request->validate([
            'travel_id' => 'required',
        ]);

        // Ambil data jadwal travel berdasarkan ID
        $jadwalTravel = JadwalTravel::findOrFail($request->travel_id);

        // Cek jika kuota habis
        if ($jadwalTravel->kuota_travel <= 0) {
            return response()->json([
                'message' => 'Kuota Habis',
            ], 400);
        }
        do {
            $kodeOrder = strtoupper(Str::random(8)); // 8 karakter acak (huruf kapital & angka)
        } while (OrderTravel::where('kode_order', $kodeOrder)->exists()); // Cek duplikasi

        //OrderTravel
        $order = OrderTravel::create([
            'user_id' => auth()->user()->id,
            'kode_order' => $kodeOrder,
            'travel_id' => $jadwalTravel->id,
            'nama_travel' => $jadwalTravel->nama_travel,
            'tanggal_travel' => $jadwalTravel->tanggal_travel,
            'asal_travel' => $jadwalTravel->asal_travel,
            'tujuan_travel' => $jadwalTravel->tujuan_travel,
            'harga_travel' => $jadwalTravel->harga_travel,
            'jam_travel' => $jadwalTravel->jam_travel,
            'status_pembayaraan' => 'Menunggu Pembayaran'
        ]);
        // Kurangi kuota travel
        $jadwalTravel->decrement('kuota_travel', 1);
        return redirect()->route('frontend.order.pembayaraan', $order->kode_order)->with('success', 'Berhasil Melakukan Order');
    }
    public function metode_pembayaraan($kode_order)
    {
        $order = OrderTravel::where('kode_order', $kode_order)->firstOrFail();
        return view('frontend.user.order.metode_pembayaraan', compact('order'));
    }
    public function order_pembayaraan(Request $request)
    {
        // Cari order berdasarkan ID
        $order = OrderTravel::findOrFail($request->id);

        // Update metode pembayaran
        $order->update([
            'metode_pembayaraan' => $request->metode_pembayaraan,
        ]);

        return redirect()->route('frontend.order.status.pembayaraan', $order->kode_order)->with('success', 'Lakukan Transaksi Pembayaraan');
    }
    public function status_pembayaraan($kode_order)
    {
        // Cari order berdasarkan kode_order, jika tidak ada akan return 404
        $order = OrderTravel::where('kode_order', $kode_order)->firstOrFail();
        return view('frontend.user.order.status_pembayaraan', compact('order'));
    }
    public function callback_pembayaraan(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status_pembayaraan' => 'required|in:Belum Bayar,Sudah Bayar',
        ]);

        // Cari order berdasarkan ID
        $order = OrderTravel::findOrFail($id);

        // Update status pembayaran
        $order->update([
            'status_pembayaraan' => $request->status_pembayaraan,
        ]);
        return redirect()->route('frontend.riwayat.detail', $order->id)->with('success', 'melakukan pembayaraan');
    }

    public function riwayatOrder()
    {
        // Ambil data order berdasarkan user yang login
        $orders = OrderTravel::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Tampilkan view riwayat order dengan data orders
        return view('frontend.user.riwayat.index', compact('orders'));
    }
    public function detailorder($id)
    {
        $order = OrderTravel::find($id);
        return view('frontend.user.riwayat.detail', compact('order'));
    }
    public function cetak_invoice($id)
    {
        // Mengambil data antrian berdasarkan ID
        $order = OrderTravel::findOrFail($id);
        // Mengambil view PDF
        $pdf = PDF::loadView('frontend.user.riwayat.pdf.bukti-transaksi', compact('order'));
        // Mengatur nama file PDF
        $filename = 'Bukti_' . Auth::user()->name . '.pdf';
        // Mengirim PDF untuk diunduh
        return $pdf->download($filename);
    }
}
