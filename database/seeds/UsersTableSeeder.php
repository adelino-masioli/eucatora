<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'name'           => 'Junior Ferreira',
                'email'          => 'alfjuniorbh.web@gmail.com',
                'password'       => Hash::make('102030'),
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ),
            array(
                'name'           => 'Administrador',
                'email'          => 'eucatora@eucatora.com.br',
                'password'       => Hash::make('@cidaadmin'),
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            )
        );


        //insert data
        foreach ($data as $datas) {
            DB::table('users')->insert($datas);
        }
    }
}
