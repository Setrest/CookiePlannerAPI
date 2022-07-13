<?php

namespace Database\Seeders;

use Database\Seeders\Fakes\IngredientsFakeSeeder;
use Database\Seeders\Fakes\MealtimeFakeSeeder;
use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            IngredientsFakeSeeder::class,
            MealtimeFakeSeeder::class
        ]);
    }
}
