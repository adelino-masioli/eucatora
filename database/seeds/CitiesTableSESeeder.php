<?php

use Illuminate\Database\Seeder;

class CitiesTableSESeeder extends Seeder
{
    /**
     * Alimenta um schema de cities com as cities de Sergipe
     * @author Cesar André (https://github.com/cesar-andre)
     * @return void
     */
    public function run()
    {
    DB::table('cities')->insert(['id' => 2800100, 'states_id' => 28, 'name' => 'Amparo de São Francisco']);
	DB::table('cities')->insert(['id' => 2800209, 'states_id' => 28, 'name' => 'Aquidabã']);
	DB::table('cities')->insert(['id' => 2800308, 'states_id' => 28, 'name' => 'Aracaju']);
	DB::table('cities')->insert(['id' => 2800407, 'states_id' => 28, 'name' => 'Arauá']);
	DB::table('cities')->insert(['id' => 2800506, 'states_id' => 28, 'name' => 'Areia Branca']);
	DB::table('cities')->insert(['id' => 2800605, 'states_id' => 28, 'name' => 'Barra dos Coqueiros']);
	DB::table('cities')->insert(['id' => 2800670, 'states_id' => 28, 'name' => 'Boquim']);
	DB::table('cities')->insert(['id' => 2800704, 'states_id' => 28, 'name' => 'Brejo Grande']);
	DB::table('cities')->insert(['id' => 2801009, 'states_id' => 28, 'name' => 'Campo do Brito']);
	DB::table('cities')->insert(['id' => 2801108, 'states_id' => 28, 'name' => 'Canhoba']);
	DB::table('cities')->insert(['id' => 2801207, 'states_id' => 28, 'name' => 'Canindé de São Francisco']);
	DB::table('cities')->insert(['id' => 2801306, 'states_id' => 28, 'name' => 'Capela']);
	DB::table('cities')->insert(['id' => 2801405, 'states_id' => 28, 'name' => 'Carira']);
	DB::table('cities')->insert(['id' => 2801504, 'states_id' => 28, 'name' => 'Carmópolis']);
	DB::table('cities')->insert(['id' => 2801603, 'states_id' => 28, 'name' => 'Cedro de São João']);
	DB::table('cities')->insert(['id' => 2801702, 'states_id' => 28, 'name' => 'Cristinápolis']);
	DB::table('cities')->insert(['id' => 2801900, 'states_id' => 28, 'name' => 'Cumbe']);
	DB::table('cities')->insert(['id' => 2802007, 'states_id' => 28, 'name' => 'Divina Pastora']);
	DB::table('cities')->insert(['id' => 2802106, 'states_id' => 28, 'name' => 'Estância']);
	DB::table('cities')->insert(['id' => 2802205, 'states_id' => 28, 'name' => 'Feira Nova']);
	DB::table('cities')->insert(['id' => 2802304, 'states_id' => 28, 'name' => 'Frei Paulo']);
	DB::table('cities')->insert(['id' => 2802403, 'states_id' => 28, 'name' => 'Gararu']);
	DB::table('cities')->insert(['id' => 2802502, 'states_id' => 28, 'name' => 'General Maynard']);
	DB::table('cities')->insert(['id' => 2802601, 'states_id' => 28, 'name' => 'Gracho Cardoso']);
	DB::table('cities')->insert(['id' => 2802700, 'states_id' => 28, 'name' => 'Ilha das Flores']);
	DB::table('cities')->insert(['id' => 2802809, 'states_id' => 28, 'name' => 'Indiaroba']);
	DB::table('cities')->insert(['id' => 2802908, 'states_id' => 28, 'name' => 'Itabaiana']);
	DB::table('cities')->insert(['id' => 2803005, 'states_id' => 28, 'name' => 'Itabaianinha']);
	DB::table('cities')->insert(['id' => 2803104, 'states_id' => 28, 'name' => 'Itabi']);
	DB::table('cities')->insert(['id' => 2803203, 'states_id' => 28, 'name' => 'Itaporanga d\'Ajuda']);
	DB::table('cities')->insert(['id' => 2803302, 'states_id' => 28, 'name' => 'Japaratuba']);
	DB::table('cities')->insert(['id' => 2803401, 'states_id' => 28, 'name' => 'Japoatã']);
	DB::table('cities')->insert(['id' => 2803500, 'states_id' => 28, 'name' => 'Lagarto']);
	DB::table('cities')->insert(['id' => 2803609, 'states_id' => 28, 'name' => 'Laranjeiras']);
	DB::table('cities')->insert(['id' => 2803708, 'states_id' => 28, 'name' => 'Macambira']);
	DB::table('cities')->insert(['id' => 2803807, 'states_id' => 28, 'name' => 'Malhada dos Bois']);
	DB::table('cities')->insert(['id' => 2803906, 'states_id' => 28, 'name' => 'Malhador']);
	DB::table('cities')->insert(['id' => 2804003, 'states_id' => 28, 'name' => 'Maruim']);
	DB::table('cities')->insert(['id' => 2804102, 'states_id' => 28, 'name' => 'Moita Bonita']);
	DB::table('cities')->insert(['id' => 2804201, 'states_id' => 28, 'name' => 'Monte Alegre de Sergipe']);
	DB::table('cities')->insert(['id' => 2804300, 'states_id' => 28, 'name' => 'Muribeca']);
	DB::table('cities')->insert(['id' => 2804409, 'states_id' => 28, 'name' => 'Neópolis']);
	DB::table('cities')->insert(['id' => 2804458, 'states_id' => 28, 'name' => 'Nossa Senhora Aparecida']);
	DB::table('cities')->insert(['id' => 2804508, 'states_id' => 28, 'name' => 'Nossa Senhora da Glória']);
	DB::table('cities')->insert(['id' => 2804607, 'states_id' => 28, 'name' => 'Nossa Senhora das Dores']);
	DB::table('cities')->insert(['id' => 2804706, 'states_id' => 28, 'name' => 'Nossa Senhora de Lourdes']);
	DB::table('cities')->insert(['id' => 2804805, 'states_id' => 28, 'name' => 'Nossa Senhora do Socorro']);
	DB::table('cities')->insert(['id' => 2804904, 'states_id' => 28, 'name' => 'Pacatuba']);
	DB::table('cities')->insert(['id' => 2805000, 'states_id' => 28, 'name' => 'Pedra Mole']);
	DB::table('cities')->insert(['id' => 2805109, 'states_id' => 28, 'name' => 'Pedrinhas']);
	DB::table('cities')->insert(['id' => 2805208, 'states_id' => 28, 'name' => 'Pinhão']);
	DB::table('cities')->insert(['id' => 2805307, 'states_id' => 28, 'name' => 'Pirambu']);
	DB::table('cities')->insert(['id' => 2805406, 'states_id' => 28, 'name' => 'Poço Redondo']);
	DB::table('cities')->insert(['id' => 2805505, 'states_id' => 28, 'name' => 'Poço Verde']);
	DB::table('cities')->insert(['id' => 2805604, 'states_id' => 28, 'name' => 'Porto da Folha']);
	DB::table('cities')->insert(['id' => 2805703, 'states_id' => 28, 'name' => 'Propriá']);
	DB::table('cities')->insert(['id' => 2805802, 'states_id' => 28, 'name' => 'Riachão do Dantas']);
	DB::table('cities')->insert(['id' => 2805901, 'states_id' => 28, 'name' => 'Riachuelo']);
	DB::table('cities')->insert(['id' => 2806008, 'states_id' => 28, 'name' => 'Ribeirópolis']);
	DB::table('cities')->insert(['id' => 2806107, 'states_id' => 28, 'name' => 'Rosário do Catete']);
	DB::table('cities')->insert(['id' => 2806206, 'states_id' => 28, 'name' => 'Salgado']);
	DB::table('cities')->insert(['id' => 2806305, 'states_id' => 28, 'name' => 'Santa Luzia do Itanhy']);
	DB::table('cities')->insert(['id' => 2806404, 'states_id' => 28, 'name' => 'Santana do São Francisco']);
	DB::table('cities')->insert(['id' => 2806503, 'states_id' => 28, 'name' => 'Santa Rosa de Lima']);
	DB::table('cities')->insert(['id' => 2806602, 'states_id' => 28, 'name' => 'Santo Amaro das Brotas']);
	DB::table('cities')->insert(['id' => 2806701, 'states_id' => 28, 'name' => 'São Cristóvão']);
	DB::table('cities')->insert(['id' => 2806800, 'states_id' => 28, 'name' => 'São Domingos']);
	DB::table('cities')->insert(['id' => 2806909, 'states_id' => 28, 'name' => 'São Francisco']);
	DB::table('cities')->insert(['id' => 2807006, 'states_id' => 28, 'name' => 'São Miguel do Aleixo']);
	DB::table('cities')->insert(['id' => 2807105, 'states_id' => 28, 'name' => 'Simão Dias']);
	DB::table('cities')->insert(['id' => 2807204, 'states_id' => 28, 'name' => 'Siriri']);
	DB::table('cities')->insert(['id' => 2807303, 'states_id' => 28, 'name' => 'Telha']);
	DB::table('cities')->insert(['id' => 2807402, 'states_id' => 28, 'name' => 'Tobias Barreto']);
	DB::table('cities')->insert(['id' => 2807501, 'states_id' => 28, 'name' => 'Tomar do Geru']);
	DB::table('cities')->insert(['id' => 2807600, 'states_id' => 28, 'name' => 'Umbaúba']);
    }
}
