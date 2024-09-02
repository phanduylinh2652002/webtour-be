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
        Schema::create('tours', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('tour_guide_id');
            $table->string('name');
            $table->integer('price')->unsigned();
            $table->integer('discount')->unsigned()->nullable();
            $table->string('image');
            $table->string('start_at');
            $table->integer('quantity')->unsigned();
            $table->longText('description');
            $table->longText('trip');
            $table->string('place');
            $table->string('vehicle');
            $table->string('locationStart');
            $table->string('locationEnd');
            $table->string('quantityDate');
            $table->string('dateStart');
            $table->string('dateEnd');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
