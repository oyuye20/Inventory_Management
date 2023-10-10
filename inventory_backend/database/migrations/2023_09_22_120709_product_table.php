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
        Schema::create('categories', function(Blueprint $table){
            $table->increments('id');
            $table->string('category');
            $table->string('description');
            $table->boolean('isArchived');
            $table->timestamps();
        });


        Schema::create('product_infos', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string('serial_number');
            $table->string('manufacturer');
            $table->string('product_name');
            $table->string('description');
            $table->string('price');
            $table->string('size');
            $table->boolean('isArchived');
            $table->timestamps();

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');
        });


        Schema::create('inventories', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('category');
            $table->string('stocks');
            $table->date('production_date');
            $table->date('expiration_date');
            $table->string('status');
            $table->timestamps();

            $table->foreign('product_id')
            ->references('id')
            ->on('product_infos')
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
