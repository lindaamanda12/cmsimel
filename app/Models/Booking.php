<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = [
        'kendaraan_id',
        'nama_pelanggan',
        'no_hp',
        'tanggal_mulai',
        'tanggal_selesai',
        'catatan',
        'total_harga',
        'status',
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
