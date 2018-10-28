<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Product::create([
            'name' => 'Workshop - 1 dag',
            'base_price' => 100,
            'unit_price' => 2.5
        ]);

        \App\Product::create([
            'name' => 'Workshop - 3 dagen',
            'base_price' => 200,
            'unit_price' => 2.5
        ]);

        \App\Product::create([
            'name' => 'Projectweek - 5 dagen',
            'base_price' => 300,
            'unit_price' => 2.0
        ]);
    }
}
