<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financials', function(Blueprint $table) {
            $table->increments('id');
            $table->string('transaction');
            $table->string('title');
            $table->date('date_initial');
            $table->date('date_final');
            $table->date('date_alert');
            $table->time('time');
            $table->integer('amount');
            $table->decimal('price', 10,2);
            $table->string('provider');
            $table->text('description');
            $table->integer('type');
            $table->integer('status');
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
        Schema::drop('financials');
    }
}
