<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TrainingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => strtoupper('capacitacion '.$this->faker->numberBetween(1,3)),
            'capacity' => $this->faker->numberBetween(5,15),
            'dateIn'=> '10:00',
            'DateOut' => '22:00',
            'date' => strtoupper('2022-10-'.$this->faker->numberBetween(26,28)),
        ];
    }
}
