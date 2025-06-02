<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota>
 */
class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jumlahDipinjam = rand(1, 10);
        return [
            'no_anggota' => rand(1111111111, 9999999999),
            'tanggal_lahir' => fake()->dateTimeBetween($startDate = '-50 years', $endDate = '-18 years', $timezone = null)->format('Y-m-d'),
            'nama' => fake()->name(),
            'stock' => $jumlahDipinjam
        ];
    }
}
