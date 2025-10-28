<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use Faker\Factory as Faker;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Menu::create([
                'nama_menu' => $faker->word . ' Nasi Kuning',
                'harga' => $faker->randomFloat(2, 5000, 20000),
                'stok' => $faker->numberBetween(10, 100),
            ]);
        }
    }
}