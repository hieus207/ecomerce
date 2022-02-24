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
        $this->call(Catalogseeder::class);
        $this->call(Categoryseeder::class);
        $this->call(Productseeder::class);
        $this->call(ProductImageseeder::class);
    }
}
