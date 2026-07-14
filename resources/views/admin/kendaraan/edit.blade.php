@extends('layout.admin')

@section('title', 'Edit Kendaraan')

@section('content')

<div class="card">

    <div class="card-header">Edit Kendaraan</div>

    <div class="card-body">

        <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-select">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ old('kategori_id', $kendaraan->kategori_id) == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Kendaraan</label>
                    <input type="text" name="nama_kendaraan" class="form-control" value="{{ old('nama_kendaraan', $kendaraan->nama_kendaraan) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Merk</label>
                    <input type="text" name="merk" class="form-control" value="{{ old('merk', $kendaraan->merk) }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tahun</label>
                    <input type="number" name="tahun" class="form-control" value="{{ old('tahun', $kendaraan->tahun) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga / Hari (Rp)</label>
                    <input type="number" name="harga" class="form-control" value="{{ old('harga', $kendaraan->harga) }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Fasilitas (pisahkan per baris)</label>
                <textarea name="fasilitas" class="form-control" rows="3">{{ old('fasilitas', $kendaraan->fasilitas) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $kendaraan->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto</label><br>
                @if($kendaraan->foto)
                    <img src="{{ asset('storage/' . $kendaraan->foto) }}" width="100" class="mb-2" style="border-radius:6px"><br>
                @endif
                <input type="file" name="foto" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Batal</a>

        </form>

    </div>

</div>

@endsection
