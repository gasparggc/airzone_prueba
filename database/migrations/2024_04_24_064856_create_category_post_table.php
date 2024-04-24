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
        Schema::create('category_post', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedinteger('category_id');
            $table->unsignedinteger('post_id');

            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_post');
    }
};
