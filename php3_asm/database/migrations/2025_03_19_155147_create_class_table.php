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
        Schema::create('class', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time_start')->nullable();
            $table->enum('status', ['Chưa hoạt động', 'Đang hoạt động', 'Ngừng hoạt động'])->default('Chưa hoạt động');
            $table->timestamps();
            // foreign key
            $table->unsignedBigInteger('id_type');
            $table->unsignedBigInteger('id_subject');
            $table->unsignedBigInteger('id_tutor');

            $table->foreign('id_type')->references('id')->on('type_class');
            $table->foreign('id_subject')->references('id')->on('subject');
            $table->foreign('id_tutor')->references('id')->on('tutor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class');
    }
};