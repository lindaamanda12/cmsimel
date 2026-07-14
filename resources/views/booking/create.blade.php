@extends('layout.front')

@section('content')

<div class="container" style="padding-top:60px">

    <h1 class="section-title">Booking Kendaraan</h1>

    <div class="about-section" style="grid-template-columns:1fr">

        <div class="about-content">

            @if(session('success'))
                <div style="background:#dcfce7;color:#166534;padding:16px 20px;border-radius:10px;margin-bottom:20px">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div style="background:#fee2e2;color:#991b1b;padding:16px 20px;border-radius:10px;margin-bottom:20px">
                    <ul style="margin:0;padding-left:18px">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <p>
                Anda akan booking:
                <strong>{{ $kendaraan->nama_kendaraan }}</strong>
                ({{ $kendaraan->kategori->nama_kategori ?? '' }})
                &mdash; Rp {{ number_format($kendaraan->harga, 0, ',', '.') }} / Hari
            </p>

            <form action="{{ route('booking.store') }}" method="POST" style="margin-top:20px">
                @csrf

                <input type="hidden" name="kendaraan_id" value="{{ $kendaraan->id }}">

                <div style="margin-bottom:16px">
                    <label>Nama Lengkap</label><br>
                    <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}"
                        style="width:100%;padding:12px;border-radius:8px;border:1px solid #cbd5e1">
                </div>

                <div style="margin-bottom:16px">
                    <label>No. HP / WhatsApp</label><br>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                        style="width:100%;padding:12px;border-radius:8px;border:1px solid #cbd5e1">
                </div>

                <div style="display:flex;gap:16px;margin-bottom:16px">
                    <div style="flex:1">
                        <label>Tanggal Mulai</label><br>
                        <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}"
                            style="width:100%;padding:12px;border-radius:8px;border:1px solid #cbd5e1">
                    </div>
                    <div style="flex:1">
                        <label>Tanggal Selesai</label><br>
                        <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}"
                            style="width:100%;padding:12px;border-radius:8px;border:1px solid #cbd5e1">
                    </div>
                </div>

                <div style="margin-bottom:20px">
                    <label>Catatan (opsional)</label><br>
                    <textarea name="catatan" rows="3"
                        style="width:100%;padding:12px;border-radius:8px;border:1px solid #cbd5e1">{{ old('catatan') }}</textarea>
                </div>

                <button type="submit" class="btn">Kirim Booking</button>

            </form>

        </div>

    </div>

</div>

@endsection
