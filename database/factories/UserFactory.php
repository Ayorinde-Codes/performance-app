<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstname(),
            'lastname' => $this->faker->lastname(),
            'email' => $this->faker->unique()->safeEmail(),
            'username' => $this->faker->username(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone' => $this->faker->phoneNumber(),
            'qualification' => $this->faker->jobTitle(),
            'department' => $this->faker->jobTitle(),
            'employee_id' => $this->faker->unique()->numberBetween(1, 100),
            'job_title' => $this->faker->jobTitle(),
            'employment_date' => now(),
            'role_start' => now(),
            'period_covered' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}