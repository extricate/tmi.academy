<?php

use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Package::create([
            'name' => 'Verantwoord social mediagebruik',
            'base_price' => 100,
            'unit_price' => 1
        ]);

        \App\Package::create([
            'name' => 'Verantwoord social mediagebruik',
            'base_price' => 100,
            'unit_price' => 1
        ]);

        \App\Package::create([
            'name' => 'Cybercrime',
            'base_price' => 0,
            'unit_price' => 0
        ]);
    }
}
