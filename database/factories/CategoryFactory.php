<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $name = $this->faker->sentence();
		$name = $this->faker->name;
		$slug = Str::slug($name, '-');
		$startDate = '2020-07-31';
		$endDate = now();
		$created_at = $this->faker->dateTimeBetween($startDate, $endDate);
		$updated_at = $this->faker->dateTimeBetween($startDate, $endDate);

		return [
			//
			// 'name' => $name,
			// 'slug' => $slug,

			'name' => Str::random(10),
			'created_at' => $created_at,
			'updated_at' => $updated_at,
		];
    }
}
