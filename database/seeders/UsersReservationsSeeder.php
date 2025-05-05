<?php

namespace Database\Seeders;

use App\Models\UserReservation;
use Illuminate\Database\Seeder;

class UsersReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserReservation::factory()->count(5)->create();
    }
}
