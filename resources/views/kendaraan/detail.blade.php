@extends('layout.front')

@section('content')

<div class="container">

    <div class="about-section">

        <div class="about-image">
            @if($kendaraan->foto)
                <img src="{{ asset('storage/' . $kendaraan->foto) }}" alt="{{ $kendaraan->nama_kendaraan }}">
            @endif
        </div>

        <div class="about-content">

            <span class="about-tag">{{ $kendaraan->kategori->nama_kategori ?? '' }}</span>

            <h3>{{ $kendaraan->nama_kendaraan }}</h3>

            <p>
                <strong>Merk:</strong> {{ $kendaraan->merk ?? '-' }} &nbsp;|&nbsp;
                <strong>Tahun:</strong> {{ $kendaraan->tahun }}
            </p>

            @if($kendaraan->deskripsi)
                <p>{{ $kendaraan->deskripsi }}</p>
            @endif

            <h4>Fasilitas :</h4>
            <ul>
                @foreach(preg_split('/\r\n|\r|\n/', $kendaraan->fasilitas) as $poin)
                    @if(trim($poin) !== '')
                        <li>🔥 {{ trim($poin) }}</li>
                    @endif
                @endforeach
            </ul>

            <div class="about-stats">
                <div class="stat-box">
                    <h4>Rp {{ number_format($kendaraan->harga, 0, ',', '.') }}</h4>
                    <p>Per Hari</p>
                </div>
            </div>

            <br>

            <a href="{{ route('booking.create', $kendaraan->id) }}" class="btn">
                Booking Sekarang
            </a>

            <a href="https://wa.me/62897654321?text=Saya ingin sewa {{ urlencode($kendaraan->nama_kendaraan) }}" class="btn" style="background:#22c55e">
                Chat WhatsApp
            </a>

        </div>

    </div>

</div>

@endsection
