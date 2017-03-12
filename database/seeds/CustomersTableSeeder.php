<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
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
                'name'          => 'Mademasil Madeireira Masioli Ldta',
                'document_type' => 'cnpj',
                'document'      => '45.657.774/0001-28',
                'site'          => 'www.mademasil.com.br',
                'email'         => 'contato@mademasil.com.br',
                'phone'         => '(31)9809-5410',
                'celullar'      => '(31)9809-5410',
                'zipcode'       => '30.190-110',
                'neighborhood'  => 'Centro',
                'address'       => 'Rua dos Timbiras',
                'number'        => '2500',
                'complement'    => 'Esquina',
                'state_id'      => 31,
                'city_id'       => 3106200,
                'status_id'     => 1,
            )
        );


        //insert data
        foreach ($data as $datas) {
            DB::table('customers')->insert($datas);
        }
    }
}
