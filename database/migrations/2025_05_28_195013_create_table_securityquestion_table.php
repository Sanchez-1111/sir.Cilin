<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\SecurityQuestion;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('security_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->timestamps();
        });

        $questions = [
            ['question' => 'What is your mother’s maiden name?'],
            ['question' => 'What was your first pet’s name?'],
            ['question' => 'What is your favorite book?'],
            ['question' => 'What was the name of your first school?'],
            ['question' => 'What is your favorite food?'],
        ];

        foreach ($questions as $question) {
            SecurityQuestion::create($question);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security_questions');
    }
};
