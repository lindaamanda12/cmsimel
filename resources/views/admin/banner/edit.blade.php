@extends('layout.admin')

@section('title', 'Edit Banner')

@section('content')

<div class="card">

    <div class="card-header">Edit Banner</div>

    <div class="card-body">

        <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $banner->judul) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Subjudul</label>
                <textarea name="subjudul" class="form-control" rows="2">{{ old('subjudul', $banner->subjudul) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Link WhatsApp</label>
                <input type="text" name="link_wa" class="form-control" value="{{ old('link_wa', $banner->link_wa) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar</label><br>
                @if($banner->gambar)
                    <img src="{{ asset('storage/' . $banner->gambar) }}" width="150" class="mb-2" style="border-radius:6px"><br>
                @endif
                <input type="file" name="gambar" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('banner.index') }}" class="btn btn-secondary">Batal</a>

        </form>

    </div>

</div>

@endsection
