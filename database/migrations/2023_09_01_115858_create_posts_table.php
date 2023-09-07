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
            $table->id();
            $table->string('img');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('role_id');
            $table->string('title');
            $table->string('slug');
            $table->text('desc');
            $table->string('keywords')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->tinyInteger('is_active');
            $table->tinyInteger('is_feature');
            $table->enum('status', ['pending', 'public'])->default('pending');
            $table->timestamps();
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
