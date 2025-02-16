<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JadwalTravel;
use App\Models\OrderTravel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $travel = JadwalTravel::count();
        $transaksi = OrderTravel::count();
        $user = User::count();
        return view('backend.dashboard', compact('travel', 'transaksi', 'user'));
    }
}
