<?php

namespace Database\Factories;

use App\Models\HealthTips;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HealthTipsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HealthTips::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->url,
            'description' => $this->faker->sentence(15),
            'content' => $this->faker->text,
            'source' => $this->faker->text,
            'health_category_id' => \App\Models\HealthCategory::factory(),
        ];
    }
}
