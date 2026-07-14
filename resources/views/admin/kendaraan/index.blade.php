@extends('layout.admin')

@section('title', 'Data Kendaraan')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Kendaraan (Motor & Mobil)</h5>
        <a href="{{ route('kendaraan.create') }}" class="btn btn-primary btn-sm">
            + Tambah Kendaraan
        </a>
    </div>

    <div class="card-body">

        <form method="GET" class="mb-3" style="max-width:250px">
            <select name="kategori_id" class="form-select" onchange="this.form.submit()">
                <option value="">Semua Kategori</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ request('kategori_id') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </form>

        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th width="80">Foto</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Merk</th>
                    <th>Tahun</th>
                    <th>Harga/Hari</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kendaraan as $item)
                <tr>
                    <td>{{ $loop->iteration + ($kendaraan->currentPage() - 1) * $kendaraan->perPage() }}</td>
                    <td>
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" width="60" style="border-radius:6px">
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td>{{ $item->nama_kendaraan }}</td>
                    <td>
                        <span class="badge bg-info text-dark">{{ $item->kategori->nama_kategori ?? '-' }}</span>
                    </td>
                    <td>{{ $item->merk ?? '-' }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('kendaraan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kendaraan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kendaraan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">Belum ada data kendaraan</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $kendaraan->links() }}

    </div>

</div>

@endsection
