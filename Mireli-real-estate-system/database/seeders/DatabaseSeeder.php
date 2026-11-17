<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Pair 1 wires the seeders together in dependency order (interface I9).
     * When another pair adds a seeder, they add one line below, in this order:
     * users, properties (Pair 2), viewings (Pair 3), interest rates and demo payments (Pair 4).
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            // PropertySeeder::class,      // Pair 2
            // ViewingSeeder::class,       // Pair 3
            // InterestRateSeeder::class,  // Pair 4
        ]);
    }
}
