<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\HealthCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class HealthCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HealthCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cat_name' => $this->faker->text(255),
        ];
    }
}
