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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id'); // คอลัมน์สำหรับเก็บ id ของ post
            $table->string('image_name'); // คอลัมน์สำหรับเก็บชื่อของรูปภาพ
            $table->timestamps();
            
            // สร้างความสัมพันธ์กับตาราง "posts"
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
