<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Payment;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Correcting the table name to 'payments' (plural)
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // The payment data to be inserted
        $payments = [
            ['name' => 'Gcash'],
            ['name' => 'Bank Transfer'],
            ['name' => 'Cash'],
            ['name' => 'Credit Card'],
            ['name' => 'Home Credit'],
        ];

        // Insert each payment method individually
        foreach ($payments as $payment) {
            Payment::create($payment); // Use $payment here instead of $payments
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
