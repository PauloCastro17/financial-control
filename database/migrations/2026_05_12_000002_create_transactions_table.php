<?php

use App\Models\Category;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('type'); //income e expense
            $table->float('amount');
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete(); //criar category_id para referenciar qual a categoria
            $table->foreignIdFor(Wallet::class)->constrained()->cascadeOnDelete(); //criar wallet_id para referenciar qual a conta
            $table->string('description');
            $table->dateTime('transaction_date')->nullable();
            $table->string('status_transaction'); //pending, completed, failed
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('transactions');
        Schema::enableForeignKeyConstraints();
    }
};
