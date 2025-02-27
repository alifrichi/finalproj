<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->text('featured_image');
            $table->string('genre');
            $table->string('category');
            $table->decimal('price_per_month', 8, 2); // Add price_per_month column
            $table->decimal('price_per_week', 8, 2); // Add price_per_week column
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
