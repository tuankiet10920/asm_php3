<?php

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
        Schema::create('student_class', function (Blueprint $table) {
            $table->id();
            $table->integer('point')->nullable();
            $table->text('feedback_content')->nullable();
            $table->dateTime('feedback_time')->nullable();
            $table->integer('class_opener');
            $table->integer('payment_total')->nullable();
            $table->dateTime('payment_time')->nullable();
            $table->timestamps();

            // foreign key
            $table->unsignedBigInteger('id_student');
            $table->unsignedBigInteger('id_class');

            $table->foreign('id_student')->references('id')->on('student');
            $table->foreign('id_class')->references('id')->on('class');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_class');
    }
};
