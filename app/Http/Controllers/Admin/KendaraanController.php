<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KendaraanController extends Controller
{
    public function index(Request $request)
    {
        $kendaraan = Kendaraan::with('kategori')
            ->when($request->kategori_id, function ($q) use ($request) {
                $q->where('kategori_id', $request->kategori_id);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $kategori = Kategori::all();

        return view('admin.kendaraan.index', compact('kendaraan', 'kategori'));
    }

    public function create()
    {
        $kategori = Kategori::all();

        return view('admin.kendaraan.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori_id'    => 'required|exists:kategori,id',
            'nama_kendaraan' => 'required|string|max:255',
            'merk'           => 'nullable|string|max:255',
            'tahun'          => 'required|integer|min:1980|max:' . (date('Y') + 1),
            'harga'          => 'required|integer|min:0',
            'fasilitas'      => 'required|string',
            'deskripsi'      => 'nullable|string',
            'foto'           => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('kendaraan', 'public');
        }

        Kendaraan::create($data);

        return redirect()
            ->route('kendaraan.index')
            ->with('success', 'Kendaraan berhasil ditambahkan');
    }

    public function edit(Kendaraan $kendaraan)
    {
        $kategori = Kategori::all();

        return view('admin.kendaraan.edit', compact('kendaraan', 'kategori'));
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        $data = $request->validate([
            'kategori_id'    => 'required|exists:kategori,id',
            'nama_kendaraan' => 'required|string|max:255',
            'merk'           => 'nullable|string|max:255',
            'tahun'          => 'required|integer|min:1980|max:' . (date('Y') + 1),
            'harga'          => 'required|integer|min:0',
            'fasilitas'      => 'required|string',
            'deskripsi'      => 'nullable|string',
            'foto'           => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($kendaraan->foto) {
                Storage::disk('public')->delete($kendaraan->foto);
            }
            $data['foto'] = $request->file('foto')->store('kendaraan', 'public');
        }

        $kendaraan->update($data);

        return redirect()
            ->route('kendaraan.index')
            ->with('success', 'Kendaraan berhasil diperbarui');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        if ($kendaraan->foto) {
            Storage::disk('public')->delete($kendaraan->foto);
        }

        $kendaraan->delete();

        return redirect()
            ->route('kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus');
    }
}
