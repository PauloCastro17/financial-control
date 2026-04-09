<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
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
            'name' => fake()->randomElement(["MERCANTIL", "ALUGUEL", "ÁGUA", "ENERGIA", "FACULDADE"]),
            'type' => fake()->randomElement(['BANK_TRANSFER', 'CREDIT_CARD', 'DEBIT_CARD', 'PIX']),
            'value' => fake()->randomFloat(2, 10, 1000),
            'status' => fake()->randomElement(['PENDING', 'COMPLETED'])
        ];
    }
}
