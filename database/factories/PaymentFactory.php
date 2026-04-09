<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
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
            'name' => fake()->randomElement(["SÁLARIO", "CASA ALUGADA", "PROJETO PESSOAL", "AULA PARTICULAR", "AULA PARTICULAR"]),
            'type' => fake()->randomElement(['BANK_TRANSFER', 'CREDIT_CARD', 'DEBIT_CARD', 'PIX']),
            'value' => fake()->randomFloat(2, 10, 1000),
            'status' => fake()->randomElement(['PENDING', 'COMPLETED'])
        ];
    }
}
