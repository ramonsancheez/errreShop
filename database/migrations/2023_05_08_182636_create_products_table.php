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
        Schema::create('products', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->string('name');
            $table->string('image_url')->default("");
            $table->float('price');
            $table->string('description')->default("");
            $table->integer('points');
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('buyer_id')->default(0);
            $table->foreignId('state_id')->constrained();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
