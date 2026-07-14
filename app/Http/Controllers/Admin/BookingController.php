<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $booking = Booking::with('kendaraan')
            ->when($request->status, function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.booking.index', compact('booking'));
    }

    public function show(Booking $booking)
    {
        $booking->load('kendaraan.kategori');

        return view('admin.booking.show', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,dikonfirmasi,ditolak,selesai',
        ]);

        $booking->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.booking.index')
            ->with('success', 'Status booking berhasil diperbarui');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()
            ->route('admin.booking.index')
            ->with('success', 'Booking berhasil dihapus');
    }
}
