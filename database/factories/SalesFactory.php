<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $email=fake()->email();
        return [                 
            'name' => fake()->userName(),
            'email' => $email,
            'role' =>'sales',
            'password'=>Hash::make($email),     
        ];
    }
}
