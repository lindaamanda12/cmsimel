@extends('layout.front')

@section('content')

<div class="hero">
    <div>
        <h1>Sewa Mobil & Motor Terpercaya</h1>
        <p>
            Armada lengkap, harga bersahabat, dan pelayanan cepat.
            Booking online kapan saja, kami siap mengantar unit ke lokasi Anda.
        </p>
        <a href="/motor" class="btn">Lihat Motor</a>
        <a href="/mobil" class="btn">Lihat Mobil</a>
    </div>
</div>

@if($banner->count())
<div class="container" style="padding-top:40px;padding-bottom:40px">

    <h2 class="section-title">Promo</h2>

    <div class="promo-container">

    @foreach($banner as $item)

    <div class="promo-card">

        @if($item->gambar)
            <img src="{{ asset('storage/'.$item->gambar) }}"
                 alt="{{ $item->judul }}">
        @endif

        <div class="promo-content">

            <h3 class="promo-title">
                {{ $item->judul }}
            </h3>

            <p class="promo-desc">
                {{ $item->subjudul }}
            </p>

            <a href="{{ $item->link_wa }}"
               target="_blank"
               class="promo-btn">
                Chat WhatsApp
            </a>

        </div>

    </div>

    @endforeach

</div>

</div>
@endif


<div class="container">

    <h1 class="section-title">Motor Pilihan</h1>

    <div class="vehicle-grid">

        @forelse($motor as $item)

        <div class="vehicle-card">

            @if($item->foto)
                <img src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nama_kendaraan }}">
            @endif

            <div class="vehicle-content">
                <h3 class="vehicle-title">{{ $item->nama_kendaraan }}</h3>
            </div>

            <div class="vehicle-footer">
                <div class="vehicle-price">
                    Rp {{ number_format($item->harga,0,',','.') }} / Hari
                </div>

                <a href="{{ route('kendaraan.detail',$item->id) }}"
                   class="btn-wa">
                    Detail
                </a>
            </div>

        </div>

        @empty

        <p class="text-center">Belum ada data motor.</p>

        @endforelse

    </div>

</div>


<div class="container" style="padding-top:0">

    <h1 class="section-title">Mobil Pilihan</h1>

    <div class="vehicle-grid">

        @forelse($mobil as $item)

        <div class="vehicle-card">

            @if($item->foto)
                <img src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nama_kendaraan }}">
            @endif

            <div class="vehicle-content">
                <h3 class="vehicle-title">{{ $item->nama_kendaraan }}</h3>
            </div>

            <div class="vehicle-footer">

                <div class="vehicle-price">
                    Rp {{ number_format($item->harga,0,',','.') }} / Hari
                </div>

                <a href="{{ route('kendaraan.detail',$item->id) }}"
                   class="btn-wa">
                    Detail
                </a>

            </div>

        </div>

        @empty

        <p class="text-center">Belum ada data mobil.</p>

        @endforelse

    </div>

</div>

@endsection