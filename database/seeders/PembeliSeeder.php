<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Pembeli;
use Faker\Factory as Faker;

class PembeliSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Pembeli::create([
                'nama' => $faker->name,
                'telepon' => $faker->phoneNumber,
                'alamat' => $faker->address,
            ]);
        }
    }
}