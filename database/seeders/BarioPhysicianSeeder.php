<?php

namespace Database\Seeders;

use App\Models\BarioPhysician;
use Illuminate\Database\Seeder;

class BarioPhysicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BarioPhysician::factory()
            ->count(5)
            ->create();
    }
}
