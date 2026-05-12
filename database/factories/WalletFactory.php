<?php

namespace Database\Factories;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->randomElement(["NAME", "NAME2", "NAME3", "NAME4", "NAME5"]),
            'type' => fake()->randomElement(["TYPE", "TYPE2", "TYPE3", "TYPE4", "TYPE5"]),
            'balance' => fake()->randomFloat(2, 10, 1000),
        ];
    }
}
