<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChildCheckUpInfo;

class ChildCheckUpInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChildCheckUpInfo::factory()
            ->count(5)
            ->create();
    }
}
