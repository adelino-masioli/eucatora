<?php

use Illuminate\Database\Seeder;

class PurchaseStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('status' => 'Aberto'),
            array('status' => 'Concluído'),
            array('status' => 'Cancelado')
        );

        //insert data
        foreach ($data as $datas) {
            DB::table('purchase_status')->insert($datas);
        }
    }
}
