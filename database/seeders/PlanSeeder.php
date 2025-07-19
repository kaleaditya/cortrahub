<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run()
    {
        $plans = [
            ['name' => 'Basic Plan', 'value' => 'basic', 'is_enabled' => true],
            ['name' => 'Standard Plan', 'value' => 'standard', 'is_enabled' => true],
            ['name' => 'Executive Plan', 'value' => 'executive', 'is_enabled' => true],
            ['name' => 'Platinum Plan', 'value' => 'platinum', 'is_enabled' => false],
            ['name' => 'Associate Partner Plan', 'value' => 'associate_partner', 'is_enabled' => false],
        ];
        foreach ($plans as $plan) {
            Plan::updateOrCreate(['value' => $plan['value']], $plan);
        }
    }
} 