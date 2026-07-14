@extends('layout.admin')

@section('title', 'Edit Kategori')

@section('content')

<div class="card">

    <div class="card-header">Edit Kategori</div>

    <div class="card-body">

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>

        </form>

    </div>

</div>

@endsection
