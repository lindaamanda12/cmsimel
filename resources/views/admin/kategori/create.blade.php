@extends('layout.admin')

@section('title', 'Tambah Kategori')

@section('content')

<div class="card">

    <div class="card-header">Tambah Kategori</div>

    <div class="card-body">

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori') }}" placeholder="Motor / Mobil">
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>

        </form>

    </div>

</div>

@endsection
