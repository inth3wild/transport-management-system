<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            // \App\Models\User::factory()->create([
            //     'first_name' => 'Sixtus',
            //     'last_name' => 'Agbo',
            //     'middle_name' => 'Miracle',
            //     'phone_number' => '07080854254',
            //     'type' => 1,
            //     'gender' => 'Male',
            // ]);

            \App\Models\User::factory()->create([
                'first_name' => 'ADMIN',
                'last_name' => 'USER',
                'middle_name' => 'admin',
                'phone_number' => '11111111111',
                'type' => 1,
                'gender' => 'Male',
            ]);
            \App\Models\User::factory()->create([
                'first_name' => 'Sample Company',
                'last_name' => '',
                'middle_name' => '',
                'phone_number' => '22222222222',
                'type' => 2,
                'gender' => 'Male',
            ]);

            // \App\Models\User::factory(4)->create();
        }
    }
}
