<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehiclename');
            $table->string('color')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('mileage')->nullable();
            $table->string('contact')->nullable();
            $table->string('location')->nullable();
            $table->string('document')->nullable();
            $table->string('transmission')->nullable();
            $table->string('condition')->nullable();
            $table->text('features')->nullable();
            $table->string('status')->default('available');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
