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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedinteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->string('picture')->nullable()->default(NULL);
            $table->text('short_content');
            $table->longText('content')->nullable()->default(NULL);
            $table->dateTime('added');
            $table->timestamp('updated')->useCurrent();
            $table->unsignedTinyInteger('comment')->default(0);
            $table->unsignedTinyInteger('pending')->default(0);
            $table->unsignedTinyInteger('public')->default(1);
            $table->unsignedTinyInteger('active')->default(1);

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
