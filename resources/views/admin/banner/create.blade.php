@extends('layout.admin')

@section('title', 'Tambah Banner')

@section('content')

<div class="card">

    <div class="card-header">Tambah Banner</div>

    <div class="card-body">

        <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Subjudul</label>
                <textarea name="subjudul" class="form-control" rows="2">{{ old('subjudul') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Link WhatsApp</label>
                <input type="text" name="link_wa" class="form-control" value="{{ old('link_wa') }}" placeholder="https://wa.me/62897654321">
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control">
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('banner.index') }}" class="btn btn-secondary">Batal</a>

        </form>

    </div>

</div>

@endsection
