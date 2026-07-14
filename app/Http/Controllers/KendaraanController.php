<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    public function motor()
    {
        $kendaraan = Kendaraan::with('kategori')
            ->whereHas('kategori', function ($q) {
                $q->where('nama_kategori', 'Motor');
            })
            ->latest()
            ->get();

        return view('motor', compact('kendaraan'));
    }

    public function mobil()
    {
        $kendaraan = Kendaraan::with('kategori')
            ->whereHas('kategori', function ($q) {
                $q->where('nama_kategori', 'Mobil');
            })
            ->latest()
            ->get();

        return view('mobil', compact('kendaraan'));
    }

    public function detail(Kendaraan $kendaraan)
    {
        $kendaraan->load('kategori');

        return view('kendaraan.detail', compact('kendaraan'));
    }
}
