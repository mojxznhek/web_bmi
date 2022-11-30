<?php

namespace Database\Seeders;

use App\Models\HealthTips;
use Illuminate\Database\Seeder;

class HealthTipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HealthTips::factory()
            ->count(5)
            ->create();
    }
}
