<?php

namespace Database\Seeders\Fakes;

use App\Models\Mealtime;
use Illuminate\Database\Seeder;

class MealtimeFakeSeeder extends Seeder
{
    public function run()
    {
        Mealtime::factory()->count(3)->create();
    }
}
