<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $departure_time = Carbon::parse($this->faker->dateTimeBetween('+1 day', '+8 week'));
        return [
            'country_origin' => $this->faker->city(),
            'country_destiny' => $this->faker->city(),
            'departure_time' => $departure_time->format('Y-m-d H:i:s'),
            'eta' => $departure_time->addMinutes(rand(10, 480))->format('Y-m-d H:i:s'),
            'tickets_available' => $this->faker->numberBetween(5, 100)
        ];
    }
}
