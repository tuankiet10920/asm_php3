<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable(); // Cho phép giá trị null nếu không phải lúc nào cũng có ảnh
            $table->date('birthday')->nullable(); // Cho phép giá trị null nếu không phải lúc nào cũng có ngày sinh
            $table->string('address')->nullable(); // Cho phép giá trị null nếu không phải lúc nào cũng có địa chỉ
            $table->string('email')->unique(); // Đảm bảo email là duy nhất
            $table->string('password')->default(Hash::make('password123'));;
            $table->string('phone')->nullable(); // Cho phép giá trị null nếu không phải lúc nào cũng có số điện thoại
            $table->string('role')->default('student'); // Cho phép giá trị null nếu không phải lúc nào cũng có số điện thoại
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
