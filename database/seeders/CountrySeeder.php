<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'name' => 'India',
                'code' => 'IN',
                'phone_code' => '91',
                'is_active' => true,
            ],
            [
                'name' => 'United States',
                'code' => 'US',
                'phone_code' => '1',
                'is_active' => true,
            ],
            [
                'name' => 'United Kingdom',
                'code' => 'GB',
                'phone_code' => '44',
                'is_active' => true,
            ],
            [
                'name' => 'Canada',
                'code' => 'CA',
                'phone_code' => '1',
                'is_active' => true,
            ],
            [
                'name' => 'Australia',
                'code' => 'AU',
                'phone_code' => '61',
                'is_active' => true,
            ],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
