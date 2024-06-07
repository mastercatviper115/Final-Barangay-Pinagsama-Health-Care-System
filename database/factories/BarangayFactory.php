<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barangay>
 */
class BarangayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barangay_id' => null,
            'description' => $this->faker->sentence,
            'name' => $this->faker->name,
            // 'is_active' => $this->faker->boolean,
            'is_active' => 1,
        ];
    }
}
