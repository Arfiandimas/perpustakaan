<?php

namespace Database\Factories;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransaksiPeminjaman>
 */
class TransaksiPeminjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'buku_id' => Buku::factory(),
            'anggota_id' => User::factory(),
            'tanggal_pinjam' => now()->subDays(rand(1, 30)),
            'tanggal_kembali' => null,
        ];
    }

    public function withCreator($bukuId, $anggotaID)
    {
        return $this->state(fn (array $attributes) => [
            'buku_id' => $bukuId,
            'anggota_id' => $anggotaID,
        ]);
    }
}
