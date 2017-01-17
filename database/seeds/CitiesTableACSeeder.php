<?php

use Illuminate\Database\Seeder;

class CitiesTableACSeeder extends Seeder
{
    /**
     * Alimenta um schema de cities com as cities do Acre
     * @author Cesar André (https://github.com/cesar-andre)
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(['id' => 1200013, 'states_id' => 12, 'name' => 'Acrelândia']);
        DB::table('cities')->insert(['id' => 1200054, 'states_id' => 12, 'name' => 'Assis Brasil']);
        DB::table('cities')->insert(['id' => 1200104, 'states_id' => 12, 'name' => 'Brasiléia']);
        DB::table('cities')->insert(['id' => 1200138, 'states_id' => 12, 'name' => 'Bujari']);
        DB::table('cities')->insert(['id' => 1200179, 'states_id' => 12, 'name' => 'Capixaba']);
        DB::table('cities')->insert(['id' => 1200203, 'states_id' => 12, 'name' => 'Cruzeiro do Sul']);
        DB::table('cities')->insert(['id' => 1200252, 'states_id' => 12, 'name' => 'Epitaciolândia']);
        DB::table('cities')->insert(['id' => 1200302, 'states_id' => 12, 'name' => 'Feijó']);
        DB::table('cities')->insert(['id' => 1200328, 'states_id' => 12, 'name' => 'Jordão']);
        DB::table('cities')->insert(['id' => 1200336, 'states_id' => 12, 'name' => 'Mâncio Lima']);
        DB::table('cities')->insert(['id' => 1200344, 'states_id' => 12, 'name' => 'Manoel Urbano']);
        DB::table('cities')->insert(['id' => 1200351, 'states_id' => 12, 'name' => 'Marechal Thaumaturgo']);
        DB::table('cities')->insert(['id' => 1200385, 'states_id' => 12, 'name' => 'Plácido de Castro']);
        DB::table('cities')->insert(['id' => 1200393, 'states_id' => 12, 'name' => 'Porto Walter']);
        DB::table('cities')->insert(['id' => 1200401, 'states_id' => 12, 'name' => 'Rio Branco']);
        DB::table('cities')->insert(['id' => 1200427, 'states_id' => 12, 'name' => 'Rodrigues Alves']);
        DB::table('cities')->insert(['id' => 1200435, 'states_id' => 12, 'name' => 'Santa Rosa do Purus']);
        DB::table('cities')->insert(['id' => 1200450, 'states_id' => 12, 'name' => 'Senador Guiomard']);
        DB::table('cities')->insert(['id' => 1200500, 'states_id' => 12, 'name' => 'Sena Madureira']);
        DB::table('cities')->insert(['id' => 1200609, 'states_id' => 12, 'name' => 'Tarauacá']);
        DB::table('cities')->insert(['id' => 1200708, 'states_id' => 12, 'name' => 'Xapuri']);
        DB::table('cities')->insert(['id' => 1200807, 'states_id' => 12, 'name' => 'Porto Acre']);
    }
}
