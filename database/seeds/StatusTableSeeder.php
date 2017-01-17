<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('status' => 'Ativo'),
            array('status' => 'Inativo')
        );

        //insert data
        foreach ($data as $datas) {
            DB::table('status')->insert($datas);
        }
    }
}
