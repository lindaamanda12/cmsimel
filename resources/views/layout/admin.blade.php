<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin') - Admin Rental</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body{
            background:#f1f5f9;
        }
        .sidebar{
            min-height:100vh;
            background:#0f172a;
        }
        .sidebar a{
            color:#cbd5e1;
            text-decoration:none;
            display:block;
            padding:10px 18px;
            border-radius:8px;
            margin-bottom:4px;
        }
        .sidebar a:hover,
        .sidebar a.active{
            background:#1e293b;
            color:#38bdf8;
        }
        .sidebar .brand{
            color:#38bdf8;
            font-weight:bold;
            font-size:22px;
            padding:18px;
        }
        .topbar{
            background:#fff;
            border-bottom:1px solid #e2e8f0;
        }
    </style>

</head>
<body>

<div class="d-flex">

    <div class="sidebar p-2" style="width:230px;">

        <div class="brand">RENTALKU Admin</div>

        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="{{ route('kategori.index') }}" class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}">
            <i class="bi bi-tags"></i> Kategori
        </a>

        <a href="{{ route('kendaraan.index') }}" class="{{ request()->routeIs('kendaraan.*') ? 'active' : '' }}">
            <i class="bi bi-car-front"></i> Kendaraan (Motor/Mobil)
        </a>

        <a href="{{ route('banner.index') }}" class="{{ request()->routeIs('banner.*') ? 'active' : '' }}">
            <i class="bi bi-image"></i> Banner
        </a>

        <a href="{{ route('admin.booking.index') }}" class="{{ request()->routeIs('admin.booking.*') ? 'active' : '' }}">
            <i class="bi bi-journal-check"></i> Booking
        </a>

        <hr style="border-color:#334155">

        <a href="{{ url('/') }}" target="_blank">
            <i class="bi bi-globe"></i> Lihat Situs
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-danger w-100 mt-2">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>

    </div>

    <div class="flex-grow-1">

        <nav class="topbar navbar navbar-expand px-4 py-2">
            <span class="fw-bold">@yield('title', 'Dashboard')</span>
            <span class="ms-auto text-muted small">
                {{ auth()->user()->name ?? 'Admin' }}
            </span>
        </nav>

        <div class="container-fluid p-4">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

        </div>

    </div>

</div>

</body>
</html>
