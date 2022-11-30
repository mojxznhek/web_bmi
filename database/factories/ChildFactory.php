<?php

namespace Database\Factories;

use App\Models\Child;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Child::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'completename' => $this->faker->text(50),
            'dob' => $this->faker->date,
            'gender' => \Arr::random(['male', 'female']),
            'mothersName' => $this->faker->text(255),
            'mothersLastname' => $this->faker->text(255),
            'Address' => $this->faker->text(255),
        ];
    }
}
