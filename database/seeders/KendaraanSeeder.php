<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Kendaraan;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    public function run(): void
    {
        $motor = Kategori::firstOrCreate(['nama_kategori' => 'Motor']);
        $mobil = Kategori::firstOrCreate(['nama_kategori' => 'Mobil']);

        $dataMotor = [
            ['nama' => 'Honda Beat', 'merk' => 'Honda', 'foto' => 'kendaraan/motor/beat.jpg', 'harga' => 75000],
            ['nama' => 'Yamaha NMAX', 'merk' => 'Yamaha', 'foto' => 'kendaraan/motor/NMAX.jpg', 'harga' => 150000],
            ['nama' => 'Honda PCX', 'merk' => 'Honda', 'foto' => 'kendaraan/motor/PCX.jpg', 'harga' => 150000],
            ['nama' => 'Honda Vario', 'merk' => 'Honda', 'foto' => 'kendaraan/motor/VARIO.png', 'harga' => 120000],
            ['nama' => 'Yamaha Aerox', 'merk' => 'Yamaha', 'foto' => 'kendaraan/motor/AEROX.jpg', 'harga' => 130000],
            ['nama' => 'Honda Scoopy', 'merk' => 'Honda', 'foto' => 'kendaraan/motor/SCOOPY.png', 'harga' => 90000],
        ];

        $dataMobil = [
            ['nama' => 'Toyota Avanza', 'merk' => 'Toyota', 'foto' => 'kendaraan/mobil/AVANZA.png', 'harga' => 300000],
            ['nama' => 'Daihatsu Xenia', 'merk' => 'Daihatsu', 'foto' => 'kendaraan/mobil/xenia.png', 'harga' => 275000],
            ['nama' => 'Toyota Innova', 'merk' => 'Toyota', 'foto' => 'kendaraan/mobil/INNOVA.png', 'harga' => 450000],
            ['nama' => 'Suzuki Ertiga', 'merk' => 'Suzuki', 'foto' => 'kendaraan/mobil/ERTIGA.jpg', 'harga' => 300000],
            ['nama' => 'Mitsubishi Xpander', 'merk' => 'Mitsubishi', 'foto' => 'kendaraan/mobil/XPANDER.png', 'harga' => 350000],
            ['nama' => 'Honda Brio', 'merk' => 'Honda', 'foto' => 'kendaraan/mobil/BRIO.png', 'harga' => 250000],
        ];

        foreach ($dataMotor as $item) {
            Kendaraan::firstOrCreate(
                ['nama_kendaraan' => $item['nama']],
                [
                    'kategori_id' => $motor->id,
                    'merk'        => $item['merk'],
                    'tahun'       => 2023,
                    'harga'       => $item['harga'],
                    'fasilitas'   => "Gratis 2 Helm\n1 Jas Hujan\nGratis Antar Ambil Unit\nMotor Surat Lengkap",
                    'deskripsi'   => "Sewa harian {$item['nama']} dengan kondisi terawat, gratis antar ambil unit radius tertentu.",
                    'foto'        => $item['foto'],
                ]
            );
        }

        foreach ($dataMobil as $item) {
            Kendaraan::firstOrCreate(
                ['nama_kendaraan' => $item['nama']],
                [
                    'kategori_id' => $mobil->id,
                    'merk'        => $item['merk'],
                    'tahun'       => 2023,
                    'harga'       => $item['harga'],
                    'fasilitas'   => "BBM Full Tank\nSopir Berpengalaman (opsional)\nAsuransi Perjalanan\nMobil Surat Lengkap",
                    'deskripsi'   => "Sewa harian {$item['nama']} nyaman untuk perjalanan keluarga maupun bisnis.",
                    'foto'        => $item['foto'],
                ]
            );
        }
    }
}
