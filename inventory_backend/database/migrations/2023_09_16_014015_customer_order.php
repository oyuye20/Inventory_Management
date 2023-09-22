<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {


        Schema::create('transactions', function(Blueprint $table){
            $table->increments('id');
            $table->string('customer_name');
            $table->string('gross_total');
            $table->string('discount');
            $table->string('net_total');
            $table->timestamp('purchase_date');
            $table->string('status');
        });



        Schema::create('customer_orders', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('transactions_id');
            $table->string('product_name');
            $table->string('quantity');
            $table->string('price');
            $table->string('total');
            $table->foreign('transactions_id')
            ->references('id')
            ->on('transactions')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
