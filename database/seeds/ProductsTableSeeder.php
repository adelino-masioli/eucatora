<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                'name'         => 'Peça 5mt 8x10',
                'description'  => 'Peça de madeira eucalipto',
                'order'        => 1,
                'status_id'    => 1
            ),
            array(
                'name'         => 'Peça 5mt 10x12',
                'description'  => 'Peça de madeira eucalipto',
                'order'        => 2,
                'status_id'    => 1
            ),
            array(
                'name'         => 'Peça 5mt 12x14',
                'description'  => 'Peça de madeira eucalipto',
                'order'        => 3,
                'status_id'    => 1
            ),
            array(
                'name'         => 'Peça 5mt 14x16',
                'description'  => 'Peça de madeira eucalipto',
                'order'        => 4,
                'status_id'    => 1
            )
        );


        //insert data
        foreach ($data as $datas) {
            DB::table('products')->insert($datas);
        }
    }
}
