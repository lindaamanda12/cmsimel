<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::latest()->take(5)->get();

        $motor = Kendaraan::with('kategori')
            ->whereHas('kategori', function ($q) {
                $q->where('nama_kategori', 'Motor');
            })
            ->latest()
            ->take(3)
            ->get();

        $mobil = Kendaraan::with('kategori')
            ->whereHas('kategori', function ($q) {
                $q->where('nama_kategori', 'Mobil');
            })
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('banner', 'motor', 'mobil'));
    }
}
