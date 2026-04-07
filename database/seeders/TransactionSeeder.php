<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Transaction::query()->create([
            'name' => 'Cartão Nubank',
            'user_id' => 1,
            'type' => 'INVOICE',
            'value' => 500,
            'status' => 'PENDING'
        ]);
    }
}
