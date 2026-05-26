<?php

namespace Database\Factories;

use App\Models\Category;
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
            'type' => fake()->randomElement(["INCOME", "EXPENSE"]),
            'amount' => fake()->randomFloat(2, 10, 1000),
            'description' => fake()->realText(50),
            'transaction_date' => fake()->dateTimeBetween('2026-01-01', 'now'),
            'status_transaction' => fake()->randomElement(["PENDING", "COMPLETED"]),
            'category_id' => Category::query()->inRandomOrder()->first()->id
        ];
    }
}
