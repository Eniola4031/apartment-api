<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apartment;


class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Apartment::factory()
        ->count(100)
        ->create()
        ->each(function ($apartment) { $apartment->reviews()
            ->createMany(factory(App\Models\Review::class, 5)
            ->make()
            ->toArray());
        });

    }
}
