<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function(Blueprint $table) {
            $table->increments('id');
            $table->string('transaction');
            $table->date('date');
            $table->time('time');
            $table->decimal('total_price', 10,2);
            $table->decimal('total_area', 10,2);
            $table->decimal('total_meters_square', 10,2);
            $table->decimal('total_meters_stereo', 10,2);
            $table->integer('provider_id')->unsigned();
            $table->foreign('provider_id')->references('id')->on('providers');
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
        Schema::drop('purchases');
    }
}
