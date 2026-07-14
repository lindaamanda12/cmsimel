@extends('layout.admin')

@section('title', 'Data Banner')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Banner</h5>
        <a href="{{ route('banner.create') }}" class="btn btn-primary btn-sm">
            + Tambah Banner
        </a>
    </div>

    <div class="card-body">

        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th width="60" class="text-center">No</th>
                    <th width="220" class="text-center">Preview Banner</th>
                    <th width="220">Judul</th>
                    <th>Deskripsi</th>
                    <th width="220">Link WhatsApp</th>
                    <th width="160" class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($banner as $item)
                <tr>
                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="text-center">
                @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}"
                        alt="Banner"
                        style="
                            width:280px;
                            height:110px;
                            object-fit:cover;
                            border-radius:8px;
                            border:1px solid #dee2e6;
                        ">
                @else
                    <span class="text-muted">Tidak ada banner</span>
                @endif
            </td>

                    <td>
                        <strong>{{ Str::limit($item->judul, 35) }}</strong>
                    </td>

                    <td>
                        {{ Str::limit($item->subjudul, 90) }}
                    </td>

                    <td>
                        <small>{{ Str::limit($item->link_wa, 35) }}</small>
                    </td>

                    <td class="text-center">
                        <a href="{{ route('banner.edit', $item->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('banner.destroy', $item->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Hapus banner ini?')">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Belum ada data banner
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</div>

@endsection