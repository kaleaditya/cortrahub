<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            // Maharashtra Cities
            [
                'country_id' => 1, // India
                'state_id' => 1, // Maharashtra
                'name' => 'Mumbai',
                'code' => 'MUM',
                'is_active' => true,
            ],
            [
                'country_id' => 1,
                'state_id' => 1,
                'name' => 'Pune',
                'code' => 'PUN',
                'is_active' => true,
            ],

            // Delhi Cities
            [
                'country_id' => 1,
                'state_id' => 2, // Delhi
                'name' => 'New Delhi',
                'code' => 'NDL',
                'is_active' => true,
            ],
            [
                'country_id' => 1,
                'state_id' => 2,
                'name' => 'Gurgaon',
                'code' => 'GUR',
                'is_active' => true,
            ],

            // California Cities
            [
                'country_id' => 2, // United States
                'state_id' => 4, // California
                'name' => 'Los Angeles',
                'code' => 'LAX',
                'is_active' => true,
            ],
            [
                'country_id' => 2,
                'state_id' => 4,
                'name' => 'San Francisco',
                'code' => 'SFO',
                'is_active' => true,
            ],

            // New York Cities
            [
                'country_id' => 2,
                'state_id' => 5, // New York
                'name' => 'New York City',
                'code' => 'NYC',
                'is_active' => true,
            ],
            [
                'country_id' => 2,
                'state_id' => 5,
                'name' => 'Buffalo',
                'code' => 'BUF',
                'is_active' => true,
            ],

            // England Cities
            [
                'country_id' => 3, // United Kingdom
                'state_id' => 7, // England
                'name' => 'London',
                'code' => 'LON',
                'is_active' => true,
            ],
            [
                'country_id' => 3,
                'state_id' => 7,
                'name' => 'Manchester',
                'code' => 'MAN',
                'is_active' => true,
            ],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
