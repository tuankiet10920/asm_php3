<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tutor', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birthday')->nullable();
            $table->string('education_level')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('password')->default(Hash::make('password123'));;
            $table->string('phone')->nullable();
            $table->string('momo_acc_num')->nullable();
            $table->timestamps();
            // foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor');
    }
};
