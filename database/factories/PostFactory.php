<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
		// [Laravel 7 Lesson 12] Factories & Seeders (Seed database with faker data)
		// https://www.youtube.com/watch?v=FbARge88vjk

		// $name = $this->faker->sentence();
		$name = $this->faker->name;
		$slug = Str::slug($name, '-');
		$startDate = '2020-07-31';
		$endDate = now();
		$created_at = $this->faker->dateTimeBetween($startDate, $endDate);
		$updated_at = $this->faker->dateTimeBetween($startDate, $endDate);

		return [
			//
			'name' => $name,
			'slug' => $slug,
			'created_at' => $created_at,
			'updated_at' => $updated_at,
		];
    }
}
