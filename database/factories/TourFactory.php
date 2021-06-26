<?php

namespace Database\Factories;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'duration' => $this->faker->randomDigit(),
            'description' => $this->faker->sentence(),
            'num-of-participants' => $this->faker->randomDigit(),
            // 'cat-tour-id' => $this->faker->name(),
            'rating' => $this->faker->randomDigit(),
        ];
    }
}
