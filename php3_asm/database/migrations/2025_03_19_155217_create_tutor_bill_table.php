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
        Schema::create('tutor_bill', function (Blueprint $table) {
            $table->id();
            $table->integer('fee')->default(10);
            $table->integer('total')->default(0);
            $table->boolean('status')->default(0);
            $table->string('payment_method')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('id_tutor');
            $table->unsignedBigInteger('id_class')->unique();

            $table->foreign('id_tutor')->references('id')->on('tutor');
            $table->foreign('id_class')->references('id')->on('class');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_bill');
    }
};
