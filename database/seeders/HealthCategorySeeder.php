<?php

namespace Database\Seeders;

use App\Models\HealthCategory;
use Illuminate\Database\Seeder;

class HealthCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HealthCategory::factory()
            ->count(5)
            ->create();
    }
}
