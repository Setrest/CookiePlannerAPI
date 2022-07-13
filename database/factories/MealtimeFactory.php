<?php

namespace Database\Factories;

use App\Models\Mealtime;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealtimeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mealtime::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
        ];
    }
}
