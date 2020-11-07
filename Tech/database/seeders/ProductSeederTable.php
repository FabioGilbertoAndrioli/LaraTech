<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title' => 'Computador',
            'description' => 'Computador Asus modelo 231T',
            'price' => 2850,
            'user_id' => 1,
        ]);
        Product::create([
            'title' => 'Televisão Samsung',
            'description' => 'Telivisor Samsung 19 polegadas',
            'price' => 2700,
            'user_id' => 1,
        ]);
        Product::create([
            'title' => 'Placa de video Gforce3000',
            'description' => 'Placa de video especial para jogos',
            'price' => 3700,
            'user_id' => 1,
        ]);
        Product::create([
            'title' => 'Processor intel 7th',
            'description' => 'Processor intel de sétima geração',
            'price' => 15000,
            'user_id' => 1,
        ]);

    }
}
