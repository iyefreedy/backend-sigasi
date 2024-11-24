<?php

namespace Database\Factories\Penduduk;

use App\Models\Kelompok\Kelompok;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PendudukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'KTP' => $this->faker->nik,
            'Nama' => $this->faker->name,
            'Alamat' => $this->faker->streetAddress,
            'Desa' =>  $this->faker->randomElement(['CINERANG', 'WANGUNJAYA', 'MEKARSARI', 'WANGUNSARI', 'MALATI', 'SUKAMULYA']),
            'Kecamatan' => $this->faker->randomElement(['AGRABINTA', 'LELES', 'SINDANGBARANG', 'CIDAUN', 'NARINGGUL']),
            'Kabupaten' => 'CIANJUR',
            'TanggalLahir' => $this->faker->date,
            'JenisKelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'IDKelompok' => Kelompok::query()->inRandomOrder()->first()?->IDKelompok,
            'LastUpdateBy' => User::query()->inRandomOrder()->first()->IDPengguna,
        ];
    }
}
