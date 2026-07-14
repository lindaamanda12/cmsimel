@extends('layout.admin')

@section('title', 'Tambah Kendaraan')

@section('content')

<div class="card">

    <div class="card-header">Tambah Kendaraan</div>

    <div class="card-body">

        <form action="{{ route('kendaraan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-select">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Kendaraan</label>
                    <input type="text" name="nama_kendaraan" class="form-control" value="{{ old('nama_kendaraan') }}" placeholder="Honda Beat">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Merk</label>
                    <input type="text" name="merk" class="form-control" value="{{ old('merk') }}" placeholder="Honda">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tahun</label>
                    <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga / Hari (Rp)</label>
                    <input type="number" name="harga" class="form-control" value="{{ old('harga') }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Fasilitas (pisahkan per baris)</label>
                <textarea name="fasilitas" class="form-control" rows="3" placeholder="Gratis 2 Helm&#10;1 Jas Hujan&#10;Gratis Antar Ambil Unit">{{ old('fasilitas') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Batal</a>

        </form>

    </div>

</div>

@endsection
