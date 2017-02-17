<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_itens', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('amount_item');
            $table->string('radial', 20);
            $table->decimal('meters', 10,2);
            $table->string('meters_type', 40);
            $table->decimal('price_unit', 10,2);
            $table->decimal('price_total', 10,2);
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('sale_id')->unsigned();
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sale_itens');
    }
}
