<?php

use Illuminate\Database\Seeder;

class CitiesTableRRSeeder extends Seeder
{
    /**
     * Alimenta um schema de cities com as cities de Roraima
     * @author Cesar André (https://github.com/cesar-andre)
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(['id' => 1400027, 'states_id' => 14, 'name' => 'Amajari']);
        DB::table('cities')->insert(['id' => 1400050, 'states_id' => 14, 'name' => 'Alto Alegre']);
        DB::table('cities')->insert(['id' => 1400100, 'states_id' => 14, 'name' => 'Boa Vista']);
        DB::table('cities')->insert(['id' => 1400159, 'states_id' => 14, 'name' => 'Bonfim']);
        DB::table('cities')->insert(['id' => 1400175, 'states_id' => 14, 'name' => 'Cantá']);
        DB::table('cities')->insert(['id' => 1400209, 'states_id' => 14, 'name' => 'Caracaraí']);
        DB::table('cities')->insert(['id' => 1400233, 'states_id' => 14, 'name' => 'Caroebe']);
        DB::table('cities')->insert(['id' => 1400282, 'states_id' => 14, 'name' => 'Iracema']);
        DB::table('cities')->insert(['id' => 1400308, 'states_id' => 14, 'name' => 'Mucajaí']);
        DB::table('cities')->insert(['id' => 1400407, 'states_id' => 14, 'name' => 'Normandia']);
        DB::table('cities')->insert(['id' => 1400456, 'states_id' => 14, 'name' => 'Pacaraima']);
        DB::table('cities')->insert(['id' => 1400472, 'states_id' => 14, 'name' => 'Rorainópolis']);
        DB::table('cities')->insert(['id' => 1400506, 'states_id' => 14, 'name' => 'São João da Baliza']);
        DB::table('cities')->insert(['id' => 1400605, 'states_id' => 14, 'name' => 'São Luiz']);
        DB::table('cities')->insert(['id' => 1400704, 'states_id' => 14, 'name' => 'Uiramutã']);
    }
}
