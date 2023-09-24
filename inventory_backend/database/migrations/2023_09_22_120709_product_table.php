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
        Schema::create('category', function(Blueprint $table){
            $table->increments('id');
            $table->string('category');
            $table->string('description');
            $table->timestamps();
        });


        Schema::create('product_info', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string('serial_number');
            $table->string('manufacturer');
            $table->string('product_name');
            $table->string('description');
            $table->string('size');
            $table->timestamps();

            $table->foreign('category_id')
            ->references('id')
            ->on('category')
            ->onDelete('cascade');
        });


        Schema::create('inventory', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('product_id');
            $table->string('stocks');
            $table->date('production_date');
            $table->date('expiration_date');
            $table->date('status');
            $table->timestamps();

            $table->foreign('category_id')
            ->references('id')
            ->on('category')
            ->onDelete('cascade');

            $table->foreign('product_id')
            ->references('id')
            ->on('product_info')
            ->onDelete('cascade');
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
