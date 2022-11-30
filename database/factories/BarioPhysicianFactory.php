<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\BarioPhysician;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarioPhysicianFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BarioPhysician::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'completename' => $this->faker->text(255),
            'profession' => $this->faker->text(255),
            'license_no' => $this->faker->text(255),
        ];
    }
}
