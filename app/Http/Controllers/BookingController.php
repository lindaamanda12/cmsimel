<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Kendaraan $kendaraan)
    {
        $kendaraan->load('kategori');

        return view('booking.create', compact('kendaraan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kendaraan_id'     => 'required|exists:kendaraan,id',
            'nama_pelanggan'   => 'required|string|max:255',
            'no_hp'            => 'required|string|max:20',
            'tanggal_mulai'    => 'required|date|after_or_equal:today',
            'tanggal_selesai'  => 'required|date|after_or_equal:tanggal_mulai',
            'catatan'          => 'nullable|string',
        ]);

        $kendaraan = Kendaraan::findOrFail($data['kendaraan_id']);

        $mulai   = new \DateTime($data['tanggal_mulai']);
        $selesai = new \DateTime($data['tanggal_selesai']);
        $jumlahHari = max(1, $mulai->diff($selesai)->days + 1);

        $data['total_harga'] = $jumlahHari * $kendaraan->harga;
        $data['status'] = 'pending';

        $booking = Booking::create($data);

        return redirect()
            ->route('kendaraan.detail', $kendaraan->id)
            ->with('success', 'Booking berhasil dikirim! Tim kami akan segera menghubungi Anda untuk konfirmasi.')
            ->with('booking_id', $booking->id);
    }
}
