@extends('layout.admin')

@section('title', 'Data Booking')

@section('content')

<div class="card">

    <div class="card-header">
        <h5 class="mb-0">Data Booking</h5>
    </div>

    <div class="card-body">

        <form method="GET" class="mb-3" style="max-width:250px">
            <select name="status" class="form-select" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                @foreach(['pending','dikonfirmasi','ditolak','selesai'] as $s)
                    <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
        </form>

        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>Pelanggan</th>
                    <th>No HP</th>
                    <th>Kendaraan</th>
                    <th>Tanggal Sewa</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($booking as $item)
                <tr>
                    <td>{{ $loop->iteration + ($booking->currentPage() - 1) * $booking->perPage() }}</td>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->kendaraan->nama_kendaraan ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d/m/Y') }}</td>
                    <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                    <td>
                        @php
                            $badge = [
                                'pending' => 'warning',
                                'dikonfirmasi' => 'success',
                                'ditolak' => 'danger',
                                'selesai' => 'secondary',
                            ][$item->status] ?? 'secondary';
                        @endphp
                        <span class="badge bg-{{ $badge }}">{{ ucfirst($item->status) }}</span>
                    </td>
                    <td>
                        <a href="{{ route('admin.booking.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        <form action="{{ route('admin.booking.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus booking ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">Belum ada data booking</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $booking->links() }}

    </div>

</div>

@endsection
