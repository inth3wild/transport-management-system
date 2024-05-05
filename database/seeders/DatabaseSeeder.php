<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            \App\Models\Driver::factory(2)->create();
            \App\Models\Destination::factory(2)->create();
            \App\Models\Vehicle::factory(2)->create();
        }

        $this->call([
            UserSeeder::class,
        ]);
    }
}
