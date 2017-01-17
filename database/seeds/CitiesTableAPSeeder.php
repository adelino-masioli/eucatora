<?php

use Illuminate\Database\Seeder;

class CitiesTableAPSeeder extends Seeder
{
    /**
     * Alimenta um schema de cities com as cities do Amapá
     * @author Cesar André (https://github.com/cesar-andre)
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(['id' => 1600055, 'states_id' => 16, 'name' => 'Serra do Navio']);
		DB::table('cities')->insert(['id' => 1600105, 'states_id' => 16, 'name' => 'Amapá']);
		DB::table('cities')->insert(['id' => 1600154, 'states_id' => 16, 'name' => 'Pedra Branca do Amapari']);
		DB::table('cities')->insert(['id' => 1600204, 'states_id' => 16, 'name' => 'Calçoene']);
		DB::table('cities')->insert(['id' => 1600212, 'states_id' => 16, 'name' => 'Cutias']);
		DB::table('cities')->insert(['id' => 1600238, 'states_id' => 16, 'name' => 'Ferreira Gomes']);
		DB::table('cities')->insert(['id' => 1600253, 'states_id' => 16, 'name' => 'Itaubal']);
		DB::table('cities')->insert(['id' => 1600279, 'states_id' => 16, 'name' => 'Laranjal do Jari']);
		DB::table('cities')->insert(['id' => 1600303, 'states_id' => 16, 'name' => 'Macapá']);
		DB::table('cities')->insert(['id' => 1600402, 'states_id' => 16, 'name' => 'Mazagão']);
		DB::table('cities')->insert(['id' => 1600501, 'states_id' => 16, 'name' => 'Oiapoque']);
		DB::table('cities')->insert(['id' => 1600535, 'states_id' => 16, 'name' => 'Porto Grande']);
		DB::table('cities')->insert(['id' => 1600550, 'states_id' => 16, 'name' => 'Pracuúba']);
		DB::table('cities')->insert(['id' => 1600600, 'states_id' => 16, 'name' => 'Santana']);
		DB::table('cities')->insert(['id' => 1600709, 'states_id' => 16, 'name' => 'Tartarugalzinho']);
		DB::table('cities')->insert(['id' => 1600808, 'states_id' => 16, 'name' => 'Vitória do Jari']);
    }
}
