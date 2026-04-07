<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::query()->create([
            'name' => 'Sálario teste',
            'user_id' => 1,
            'type' => 'WAGE',
            'value' => 1500.18,
            'status' => 'PENDING'
        ]);
    }
}
