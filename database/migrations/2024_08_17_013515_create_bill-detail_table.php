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
        Schema::create('bill_detail', function (Blueprint $table) {
            $table->id();
            $table->string('tour_id');
            $table->unsignedBigInteger('bill_id');
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
