<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableACSeeder::class);
        $this->call(CitiesTableALSeeder::class);
        $this->call(CitiesTableAMSeeder::class);
        $this->call(CitiesTableAPSeeder::class);
        $this->call(CitiesTableBASeeder::class);
        $this->call(CitiesTableCESeeder::class);
        $this->call(CitiesTableDFSeeder::class);
        $this->call(CitiesTableESSeeder::class);
        $this->call(CitiesTableGOSeeder::class);
        $this->call(CitiesTableMASeeder::class);
        $this->call(CitiesTableMGSeeder::class);
        $this->call(CitiesTableMSSeeder::class);
        $this->call(CitiesTableMTSeeder::class);
        $this->call(CitiesTablePASeeder::class);
        $this->call(CitiesTablePBSeeder::class);
        $this->call(CitiesTablePESeeder::class);
        $this->call(CitiesTablePISeeder::class);
        $this->call(CitiesTablePRSeeder::class);
        $this->call(CitiesTableRJSeeder::class);
        $this->call(CitiesTableRNSeeder::class);
        $this->call(CitiesTableROSeeder::class);
        $this->call(CitiesTableRRSeeder::class);
        $this->call(CitiesTableRSSeeder::class);
        $this->call(CitiesTableSCSeeder::class);
        $this->call(CitiesTableSESeeder::class);
        $this->call(CitiesTableSPSeeder::class);
        $this->call(CitiesTableTOSeeder::class);

        //$this->call(UsersTableSeeder::class);
        $this->call(StatusTableSeeder::class);
    }
}
