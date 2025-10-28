<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use Faker\Factory as Faker;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $jumlah = $faker->numberBetween(1, 5);
            $harga = $faker->randomFloat(2, 5000, 20000); // Simulasi harga dari menu
            Transaksi::create([
                'id_pembeli' => $faker->numberBetween(1, 10),
                'id_menu' => $faker->numberBetween(1, 10),
                'jumlah' => $jumlah,
                'total_harga' => $jumlah * $harga,
                'tanggal' => $faker->dateTime,
            ]);
        }
    }
}