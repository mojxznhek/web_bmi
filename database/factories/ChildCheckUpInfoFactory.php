<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ChildCheckUpInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildCheckUpInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChildCheckUpInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'weight' => $this->faker->randomFloat(2, 0, 9999),
            'height' => $this->faker->randomFloat(2, 0, 9999),
            'remarks' => $this->faker->text(255),
            'checkup_followup' => $this->faker->date,
            'bmi' => $this->faker->randomNumber(1),
            'diagnosis' => $this->faker->text,
            'child_id' => \App\Models\Child::factory(),
            'bario_physician_id' => \App\Models\BarioPhysician::factory(),
        ];
    }
}
