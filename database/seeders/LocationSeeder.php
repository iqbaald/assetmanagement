<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['locationId' => 1, 'locationName' => 'Location 1'],
            ['locationId' => 2, 'locationName' => 'Location 2'],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
