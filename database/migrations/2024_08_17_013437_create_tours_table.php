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
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('tour_guide_id');
            $table->unsignedBigInteger('place_id_start');
            $table->unsignedBigInteger('place_id_end');
            $table->string('name');
            $table->integer('price')->unsigned();
            $table->integer('discount')->unsigned()->nullable();
            $table->string('start_at');
            $table->integer('quantity')->unsigned();
            $table->longText('description');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('tour_guide_id')->references('id')->on('tour-guides')->onDelete('cascade');
            $table->foreign('place_id_start')->references('id')->on('places')->onDelete('cascade');
            $table->foreign('place_id_end')->references('id')->on('places')->onDelete('cascade');

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
