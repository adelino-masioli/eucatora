<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Alimenta uma schema de states
     * @author Cesar André (https://github.com/cesar-andre)
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert(['id' => 12, 'uf' => 'AC', 'name' => 'ACRE', 'code_uf_ibge' => 12]);
        DB::table('states')->insert(['id' => 27, 'uf' => 'AL', 'name' => 'ALAGOAS', 'code_uf_ibge' => 27]);
        DB::table('states')->insert(['id' => 13, 'uf' => 'AM', 'name' => 'AMAZONAS', 'code_uf_ibge' => 13]);
        DB::table('states')->insert(['id' => 16, 'uf' => 'AP', 'name' => 'AMAPÁ', 'code_uf_ibge' => 16]);
        DB::table('states')->insert(['id' => 29, 'uf' => 'BA', 'name' => 'BAHIA', 'code_uf_ibge' => 29]);
        DB::table('states')->insert(['id' => 23, 'uf' => 'CE', 'name' => 'CEARÁ', 'code_uf_ibge' => 23]);
        DB::table('states')->insert(['id' => 53, 'uf' => 'DF', 'name' => 'DISTRITO FEDERAL', 'code_uf_ibge' => 53]);
        DB::table('states')->insert(['id' => 32, 'uf' => 'ES', 'name' => 'ESPÍRITO SANTO', 'code_uf_ibge' => 32]);
        DB::table('states')->insert(['id' => 52, 'uf' => 'GO', 'name' => 'GOIÁS', 'code_uf_ibge' => 52]);
        DB::table('states')->insert(['id' => 21, 'uf' => 'MA', 'name' => 'MARANHÃO', 'code_uf_ibge' => 21]);
        DB::table('states')->insert(['id' => 31, 'uf' => 'MG', 'name' => 'MINAS GERAIS', 'code_uf_ibge' => 31]);
        DB::table('states')->insert(['id' => 50, 'uf' => 'MS', 'name' => 'MATO GROSSO DO SUL', 'code_uf_ibge' => 50]);
        DB::table('states')->insert(['id' => 51, 'uf' => 'MT', 'name' => 'MATO GROSSO', 'code_uf_ibge' => 51]);
        DB::table('states')->insert(['id' => 15, 'uf' => 'PA', 'name' => 'PARÁ', 'code_uf_ibge' => 15]);
        DB::table('states')->insert(['id' => 25, 'uf' => 'PB', 'name' => 'PARAIBA', 'code_uf_ibge' => 25]);
        DB::table('states')->insert(['id' => 26, 'uf' => 'PE', 'name' => 'PERNAMBUCO', 'code_uf_ibge' => 26]);
        DB::table('states')->insert(['id' => 22, 'uf' => 'PI', 'name' => 'PIAUÍ', 'code_uf_ibge' => 22]);
        DB::table('states')->insert(['id' => 41, 'uf' => 'PR', 'name' => 'PARANÁ', 'code_uf_ibge' => 41]);
        DB::table('states')->insert(['id' => 33, 'uf' => 'RJ', 'name' => 'RIO DE JANEIRO', 'code_uf_ibge' => 33]);
        DB::table('states')->insert(['id' => 24, 'uf' => 'RN', 'name' => 'RIO GRANDE DO NORTE', 'code_uf_ibge' => 24]);
        DB::table('states')->insert(['id' => 11, 'uf' => 'RO', 'name' => 'RONDÔNIA', 'code_uf_ibge' => 11]);
        DB::table('states')->insert(['id' => 14, 'uf' => 'RR', 'name' => 'RORAIMA', 'code_uf_ibge' => 14]);
        DB::table('states')->insert(['id' => 43, 'uf' => 'RS', 'name' => 'RIO GRANDE DO SUL', 'code_uf_ibge' => 43]);
        DB::table('states')->insert(['id' => 42, 'uf' => 'SC', 'name' => 'SANTA CATARINA', 'code_uf_ibge' => 42]);
        DB::table('states')->insert(['id' => 28, 'uf' => 'SE', 'name' => 'SERGIPE', 'code_uf_ibge' => 28]);
        DB::table('states')->insert(['id' => 35, 'uf' => 'SP', 'name' => 'SÃO PAULO', 'code_uf_ibge' => 35]);
        DB::table('states')->insert(['id' => 17, 'uf' => 'TO', 'name' => 'TOCANTINS','code_uf_ibge' =>  17]);
    }
}
