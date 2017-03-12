<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_releases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction');
            $table->text('description')->nullable();
            $table->string('destination')->nullable();
            $table->string('bank')->nullable();
            $table->string('agency')->nullable();
            $table->string('account')->nullable();
            $table->string('check_number')->nullable();
            $table->decimal('value', 10,2)->nullable();
            $table->date('date_final')->nullable();
            $table->time('time')->nullable();
            $table->integer('parcel')->nullable();
            $table->string('accountant')->nullable();
            $table->string('document')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('check_releases');
    }
}
