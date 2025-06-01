<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fromDate = fake()->dateTimeBetween('now', '+1 year');
        $toDate = fake()->dateTimeBetween($fromDate, '+1 year');

        return [
            'name' => fake()->safeColorName(),
            'leader_id' => User::getRandomUserId(),
            'from_date' => $fromDate->format('Y-m-d'),
            'to_date' => $toDate->format('Y-m-d'),
        ];
    }
}
