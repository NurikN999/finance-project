<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'bin' => $this->faker->randomNumber(9, true),
            'user_id' => User::factory(),
            'bank_id' => Bank::factory(),
            'amount' => $this->faker->randomNumber(9, true),
        ];
    }
}
