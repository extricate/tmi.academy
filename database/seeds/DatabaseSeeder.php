<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PackageTableSeeder::class);
        $this->call(ProductTableSeeder::class);

        \App\Contact::create([
            'name' => 'Herman Nelissen',
            'email' => 'hsfnelissen@gmail.com',
            'created_at' => '2018-10-28 21:35:27',
            'updated_at' => '2018-10-28 21:35:27'
        ]);

        \App\Quote::create([
            'total_price' => 2300,
            'students' => 500,
            'product_id' => 1,
            'contact_id' => 1,
            'created_at' => '2018-10-28 21:35:27',
            'updated_at' => '2018-10-28 21:35:27'
        ]);


    }
}
