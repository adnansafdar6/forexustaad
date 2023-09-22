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
        Schema::create('signals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('role_id');
            $table->string('ordertype');
            $table->string('buysell');
            $table->float('price');
            $table->float('stoploss');
            $table->json('takeprofit');
            $table->string('comment');
            $table->dateTime('datetime');
            $table->longText('desc');
            $table->tinyInteger('is_active');
            $table->tinyInteger('is_feature');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signals');
    }
};
