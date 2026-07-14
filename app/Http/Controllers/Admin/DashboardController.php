<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Kategori;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahMotor = Kendaraan::whereHas('kategori', function ($q) {
            $q->where('nama_kategori', 'Motor');
        })->count();

        $jumlahMobil = Kendaraan::whereHas('kategori', function ($q) {
            $q->where('nama_kategori', 'Mobil');
        })->count();

        $jumlah        = Kendaraan::count();
        $jumlahKategori = Kategori::count();
        $jumlahBooking  = Booking::count();
        $bookingPending = Booking::where('status', 'pending')->count();

        $bookingTerbaru = Booking::with('kendaraan')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'jumlah',
            'jumlahMotor',
            'jumlahMobil',
            'jumlahKategori',
            'jumlahBooking',
            'bookingPending',
            'bookingTerbaru'
        ));
    }
}
