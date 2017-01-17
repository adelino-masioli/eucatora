<?php

use Illuminate\Database\Seeder;

class CitiesTableDFSeeder extends Seeder
{
    /**
     * Alimenta um schema de cities com as cities do Distrito Federal
     * @author Cesar André (https://github.com/cesar-andre)
     * @return void
     */
    public function run()
    {
     	DB::table('cities')->insert(['id' => 5300108, 'states_id' => 53, 'name' => 'Brasília']);
    }
}
