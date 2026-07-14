@extends('layout.admin')

@section('title', 'Dashboard')

@section('content')

<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="card text-bg-primary">
            <div class="card-body">
                <div class="small">Total Kendaraan</div>
                <div class="fs-3 fw-bold">{{ $jumlah }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-success">
            <div class="card-body">
                <div class="small">Motor</div>
                <div class="fs-3 fw-bold">{{ $jumlahMotor }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-info">
            <div class="card-body">
                <div class="small">Mobil</div>
                <div class="fs-3 fw-bold">{{ $jumlahMobil }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-warning">
            <div class="card-body">
                <div class="small">Booking Pending</div>
                <div class="fs-3 fw-bold">{{ $bookingPending }}</div>
            </div>
        </div>
    </div>

</div>

<div class="card">

    <div class="card-header">Booking Terbaru</div>

    <div class="card-body">

        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Pelanggan</th>
                    <th>Kendaraan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookingTerbaru as $item)
                <tr>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td>{{ $item->kendaraan->nama_kendaraan ?? '-' }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Belum ada booking</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('admin.booking.index') }}" class="btn btn-sm btn-primary">Lihat Semua Booking</a>

    </div>

</div>

@endsection
