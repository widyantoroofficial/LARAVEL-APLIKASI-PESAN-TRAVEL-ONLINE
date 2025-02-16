<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTravel extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'jadwaltravel';
    protected $fillable = [
        'nama_travel',
        'asal_travel',
        'tujuan_travel',
        'tanggal_travel',
        'jam_travel',
        'harga_travel',
        'kuota_travel'
    ];
    public function pesanan()
    {
        return $this->hasMany(OrderTravel::class, 'travel_id', 'id');
    }
}
