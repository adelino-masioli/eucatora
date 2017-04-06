<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function(Blueprint $table) {
            $table->increments('id');
            $table->string('transaction');
            $table->date('date');
            $table->time('time');
            $table->integer('amount');
            $table->decimal('total_price', 10,2);
            $table->decimal('total_meters', 10,2);
            $table->decimal('price_shipp', 10,2);
            $table->text('description');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('purchase_status');
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
        Schema::drop('sales');
    }
}
