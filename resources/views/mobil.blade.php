@extends('layout.front')

@section('content')

<div class="container">

    <h1 class="section-title">
        Rental Mobil
    </h1>

    <div class="vehicle-grid">

        @forelse($kendaraan as $item)

        <div class="vehicle-card">

            @if($item->foto)
                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_kendaraan }}">
            @endif

            <div class="vehicle-content">

                <h3 class="vehicle-title">
                    {{ $item->nama_kendaraan }}
                </h3>

                <h4>Fasilitas :</h4>

                <ul>
                    @foreach(preg_split('/\r\n|\r|\n/', $item->fasilitas) as $poin)
                        @if(trim($poin) !== '')
                            <li>🔥 {{ trim($poin) }}</li>
                        @endif
                    @endforeach
                </ul>

            </div>

            <div class="vehicle-footer">

                <div class="vehicle-price">
                    Rp {{ number_format($item->harga, 0, ',', '.') }} / Hari
                </div>

                <a href="{{ route('kendaraan.detail', $item->id) }}" class="btn-wa">
                    Detail
                </a>

            </div>

            <div class="note">
                <a href="{{ route('booking.create', $item->id) }}">Booking sekarang &rarr;</a>
            </div>

        </div>

        @empty
            <p style="text-align:center;grid-column:1/-1">Belum ada data mobil tersedia.</p>
        @endforelse

    </div>

</div>

@endsection
