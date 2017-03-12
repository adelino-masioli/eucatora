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
            $table->string('total_area', 255)->nullable();
            $table->string('incra', 255)->nullable();
            $table->string('register_number', 255)->nullable();
            $table->string('county', 255)->nullable();
            $table->string('book', 255)->nullable();
            $table->string('sheet', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('zipcode', 255)->nullable();
            $table->string('cood_geo_lat', 255)->nullable();
            $table->string('cood_geo_long', 255)->nullable();
            $table->string('mi', 255)->nullable();
            $table->string('plan_utm_lat', 255)->nullable();
            $table->string('plan_utm_long', 255)->nullable();
            $table->string('datum', 255)->nullable();
            $table->string('owner_name', 255)->nullable();
            $table->string('owner_cpf_cnpj', 255)->nullable();
            $table->string('owner_address', 255)->nullable();
            $table->string('owner_neig', 255)->nullable();
            $table->string('owner_city', 255)->nullable();
            $table->string('owner_zipcode', 255)->nullable();
            $table->string('explorer_name', 255)->nullable();
            $table->string('explorer_cpf_cnpj', 255)->nullable();
            $table->string('explorer_ief', 255)->nullable();
            $table->string('explorer_category', 255)->nullable();
            $table->string('explorer_address', 255)->nullable();
            $table->string('explorer_neig', 255)->nullable();
            $table->string('explorer_city', 255)->nullable();
            $table->string('explorer_zipcode', 255)->nullable();
            $table->string('explorer_phone', 255)->nullable();
            $table->string('exploration_area', 255)->nullable();
            $table->string('exploration_n_tree', 255)->nullable();
            $table->string('exploration_dap', 255)->nullable();
            $table->string('exploration_alt', 255)->nullable();
            $table->string('exploration_age', 255)->nullable();
            $table->string('exploration_rotation', 255)->nullable();
            $table->string('exploration_spacing', 255)->nullable();
            $table->string('exploration_species', 255)->nullable();
            $table->string('exploration_period', 255)->nullable();
            $table->string('exploration_qtd_oven', 255)->nullable();
            $table->string('exploration_capacity', 255)->nullable();
            $table->string('exploration_destination', 255)->nullable();
            $table->string('exploration_type', 255)->nullable();
            $table->string('exploration_wood_shoring', 255)->nullable();
            $table->string('exploration_wood_scaffolding', 255)->nullable();
            $table->string('exploration_wood_moiroes', 255)->nullable();
            $table->string('exploration_wood_firewood', 255)->nullable();
            $table->string('exploration_wood_sawmill_logs', 255)->nullable();
            $table->string('exploration_wood_sawmill_tulls', 255)->nullable();
            $table->string('exploration_wood_cellulose', 255)->nullable();
            $table->string('exploration_wood_other', 255)->nullable();
            $table->text('exploration_valume_eucalipto')->nullable();
            $table->text('exploration_valume_pinus')->nullable();
            $table->text('exploration_valume_other')->nullable();
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
