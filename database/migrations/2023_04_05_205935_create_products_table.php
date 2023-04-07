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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('price');
            $table->string('category_name');
            $table->integer('category_id');
            $table->string('subCategory_name');
            $table->integer('subCategory_id');
            $table->integer('count');
            $table->string('image');
            $table->string('slug')->unique();
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
