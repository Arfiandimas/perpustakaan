<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anggota;
use App\Models\TransaksiPeminjaman;
use App\Models\Buku;

class TransaksiPeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buku = Buku::factory()->count(10)->create();

        Anggota::factory()
        ->count(50)
        ->create()
        ->each(function ($anggota) use ($buku) {
            // Pilih jumlah random buku yang dipinjam anggota ini
            $jumlahDipinjam = rand(1, 3);

            // Ambil buku acak dari koleksi
            $bukuDipinjam = $buku->random($jumlahDipinjam);

            foreach ($bukuDipinjam as $buku) {
                TransaksiPeminjaman::factory()->create([
                    'anggota_id' => $anggota->id,
                    'buku_id' => $buku->id,
                    'tanggal_pinjam' => now()->subDays(rand(1, 30)),
                    'tanggal_kembali' => null, // pinjaman aktif
                ]);
            }

            // Update stock di anggota = jumlah buku dipinjam
            $anggota->update([
                'stock' => $jumlahDipinjam
            ]);
        });
    }
}
