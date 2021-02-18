<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //App\Models\User::factory()->count(30)->create();
         //factory(App\Models\User::class, 50)->create();

         User::factory()->count(50)->create();
    }
}
