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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('customer_id');
            $table->integer('price')->unsigned();
            $table->integer('discount')->unsigned()->nullable();
            $table->integer('quantity_oldPerson')->unsigned();
            $table->integer('quantity_youngPerson')->unsigned()->nullable();
            $table->integer('quantity_children')->unsigned()->nullable();
            $table->integer('quantity_infant')->unsigned()->nullable();
            $table->date('date_start');
            $table->date('date_end');
            $table->tinyInteger('status');
            $table->text('note')->nullable();
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
