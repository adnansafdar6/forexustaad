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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('name');
            $table->longText('link');
            $table->longText('htmllink');
            $table->tinyInteger('is_active');
            $table->tinyInteger('is_featured');
            $table->enum('type',['nav-left','nav-right','mid','content-left','content-right',]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
