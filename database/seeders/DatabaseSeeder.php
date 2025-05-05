<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder; // Add the correct seeder class

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Call your custom seeders here
        $this->call(UserSeeder::class);
        $this->call(ReservationSeeder::class);
        $this->call(UsersReservationsSeeder::class);
        $this->call(NotificationSeeder::class);
        
    }
}
