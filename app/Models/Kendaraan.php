<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    protected $fillable = [
        'kategori_id',
        'nama_kendaraan',
        'merk',
        'tahun',
        'harga',
        'fasilitas',
        'deskripsi',
        'foto',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
