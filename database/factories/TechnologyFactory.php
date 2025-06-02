<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Technology>
 */
class TechnologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'icon' => $this->faker->word(),
            'website' => $this->faker->url(),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Technology $technology) {
            if (is_null($technology->category_id)) {
                $technology->category_id = Category::factory()->create()->getKey();
            }
        });
    }
}
