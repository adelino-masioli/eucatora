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
            $table->string('transaction')->nullable();
            $table->string('denomination')->nullable();
            $table->string('total_area', 30)->nullable();
            $table->string('incra', 20)->nullable();
            $table->string('register_number', 20)->nullable();
            $table->string('county', 50)->nullable();
            $table->string('book', 20)->nullable();
            $table->string('sheet', 20)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('zipcode', 16)->nullable();
            $table->string('cood_geo_lat', 40)->nullable();
            $table->string('cood_geo_long', 40)->nullable();
            $table->string('mi', 40)->nullable();
            $table->string('plan_utm_lat', 40)->nullable();
            $table->string('plan_utm_long', 40)->nullable();
            $table->string('datum', 40)->nullable();
            $table->string('owner_name', 100)->nullable();
            $table->string('owner_cpf_cnpj', 20)->nullable();
            $table->string('owner_address', 100)->nullable();
            $table->string('owner_neig', 100)->nullable();
            $table->string('owner_city', 100)->nullable();
            $table->string('owner_zipcode', 16)->nullable();
            $table->string('explorer_name', 100)->nullable();
            $table->string('explorer_cpf_cnpj', 20)->nullable();
            $table->string('explorer_ief', 20)->nullable();
            $table->string('explorer_category', 255)->nullable();
            $table->string('explorer_address', 255)->nullable();
            $table->string('explorer_neig', 50)->nullable();
            $table->string('explorer_city', 50)->nullable();
            $table->string('explorer_zipcode', 16)->nullable();
            $table->string('explorer_phone', 30)->nullable();
            $table->string('exploration_area', 30)->nullable();
            $table->string('exploration_n_tree', 30)->nullable();
            $table->string('exploration_dap', 30)->nullable();
            $table->string('exploration_alt', 30)->nullable();
            $table->string('exploration_age', 30)->nullable();
            $table->string('exploration_rotation', 30)->nullable();
            $table->string('exploration_spacing', 30)->nullable();
            $table->string('exploration_species', 30)->nullable();
            $table->string('exploration_period', 30)->nullable();
            $table->string('exploration_qtd_oven', 30)->nullable();
            $table->string('exploration_capacity', 30)->nullable();
            $table->string('exploration_destination', 30)->nullable();
            $table->string('exploration_type', 30)->nullable();
            $table->string('exploration_wood_shoring', 30)->nullable();
            $table->string('exploration_wood_scaffolding', 30)->nullable();
            $table->string('exploration_wood_moiroes', 30)->nullable();
            $table->string('exploration_wood_firewood', 30)->nullable();
            $table->string('exploration_wood_sawmill_logs', 30)->nullable();
            $table->string('exploration_wood_sawmill_tulls', 30)->nullable();
            $table->string('exploration_wood_cellulose', 30)->nullable();
            $table->string('exploration_wood_other', 30)->nullable();
            $table->string('exploration_valume_eucalipto', 30)->nullable();
            $table->string('exploration_valume_pinus', 30)->nullable();
            $table->string('exploration_valume_other', 30)->nullable();
            $table->text('access')->nullable();
            $table->text('observation')->nullable();
            $table->date('date')->nullable()->default(date('Y-m-d'));
            $table->time('time')->nullable()->default(date('H:i:s'));
            $table->integer('status_id')->unsigned()->nullable()->default(1);
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
