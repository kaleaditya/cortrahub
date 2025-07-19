<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    public function run()
    {
        $states = [
            // India States
            [
                'country_id' => 1, // India
                'name' => 'Maharashtra',
                'code' => 'MH',
                'is_active' => true,
            ],
            [
                'country_id' => 1,
                'name' => 'Delhi',
                'code' => 'DL',
                'is_active' => true,
            ],
            [
                'country_id' => 1,
                'name' => 'Karnataka',
                'code' => 'KA',
                'is_active' => true,
            ],

            // US States
            [
                'country_id' => 2, // United States
                'name' => 'California',
                'code' => 'CA',
                'is_active' => true,
            ],
            [
                'country_id' => 2,
                'name' => 'New York',
                'code' => 'NY',
                'is_active' => true,
            ],
            [
                'country_id' => 2,
                'name' => 'Texas',
                'code' => 'TX',
                'is_active' => true,
            ],

            // UK States
            [
                'country_id' => 3, // United Kingdom
                'name' => 'England',
                'code' => 'ENG',
                'is_active' => true,
            ],
            [
                'country_id' => 3,
                'name' => 'Scotland',
                'code' => 'SCT',
                'is_active' => true,
            ],
            [
                'country_id' => 3,
                'name' => 'Wales',
                'code' => 'WLS',
                'is_active' => true,
            ],
        ];

        foreach ($states as $state) {
            State::create($state);
        }
    }
} 