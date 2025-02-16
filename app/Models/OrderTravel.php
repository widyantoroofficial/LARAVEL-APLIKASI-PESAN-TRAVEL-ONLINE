<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTravel extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'order_travel';
    protected $fillable = [
        'user_id',
        'travel_id',
        'kode_order',
        'nama_travel',
        'harga_travel',
        'asal_travel',
        'tujuan_travel',
        'tanggal_travel',
        'jam_travel',
        'status_pembayaraan',
        'metode_pembayaraan'
    ];


    public function jadwal()
    {
        return $this->belongsTo(JadwalTravel::class, 'nama_travel');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
