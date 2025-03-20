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
        Schema::create('degree', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable(); // Cho phép giá trị null nếu không phải lúc nào cũng có ảnh
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('degree');
    }
};
