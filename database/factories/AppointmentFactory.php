<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = array("Visit on site", "Online Consulation");
        $type_key = array_rand($type);

        $service = array("Medical Checkup", "TB Dots", "Dental");
        $service_key = array_rand($service);

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'type' => $type[$type_key],
            'service' => $service[$service_key],
            'date' => \Carbon\Carbon::now(),
            'barangay_code' => Str::random(10),
            'status' => "Not Approved",
            'user_id' => rand(1, 2)
        ];
    }
}
