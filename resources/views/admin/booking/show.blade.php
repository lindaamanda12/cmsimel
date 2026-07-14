@extends('layout.admin')

@section('title', 'Detail Booking')

@section('content')

<div class="card">

    <div class="card-header">Detail Booking #{{ $booking->id }}</div>

    <div class="card-body">

        <table class="table table-borderless">
            <tr>
                <th width="200">Nama Pelanggan</th>
                <td>{{ $booking->nama_pelanggan }}</td>
            </tr>
            <tr>
                <th>No HP</th>
                <td>{{ $booking->no_hp }}</td>
            </tr>
            <tr>
                <th>Kendaraan</th>
                <td>{{ $booking->kendaraan->nama_kendaraan ?? '-' }} ({{ $booking->kendaraan->kategori->nama_kategori ?? '-' }})</td>
            </tr>
            <tr>
                <th>Tanggal Sewa</th>
                <td>
                    {{ \Carbon\Carbon::parse($booking->tanggal_mulai)->format('d F Y') }}
                    s/d
                    {{ \Carbon\Carbon::parse($booking->tanggal_selesai)->format('d F Y') }}
                </td>
            </tr>
            <tr>
                <th>Catatan</th>
                <td>{{ $booking->catatan ?: '-' }}</td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td>Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Status Saat Ini</th>
                <td>{{ ucfirst($booking->status) }}</td>
            </tr>
        </table>

        <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST" class="d-flex gap-2 align-items-end">
            @csrf
            @method('PUT')

            <div>
                <label class="form-label">Ubah Status</label>
                <select name="status" class="form-select">
                    @foreach(['pending','dikonfirmasi','ditolak','selesai'] as $s)
                        <option value="{{ $s }}" {{ $booking->status == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Simpan Status</button>
            <a href="{{ route('admin.booking.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>

</div>

@endsection
