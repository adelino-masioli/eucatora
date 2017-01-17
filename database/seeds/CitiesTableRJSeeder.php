<?php

use Illuminate\Database\Seeder;

class CitiesTableRJSeeder extends Seeder
{
    /**
     * Alimenta um schema de cities com as cities do Rio de Janeiro
     * @author Cesar André (https://github.com/cesar-andre)
     * @return void
     */
    public function run()
    {
    	DB::table('cities')->insert(['id' => 3300100, 'states_id' => 33, 'name' => 'Angra dos Reis']);
		DB::table('cities')->insert(['id' => 3300159, 'states_id' => 33, 'name' => 'Aperibé']);
		DB::table('cities')->insert(['id' => 3300209, 'states_id' => 33, 'name' => 'Araruama']);
		DB::table('cities')->insert(['id' => 3300225, 'states_id' => 33, 'name' => 'Areal']);
		DB::table('cities')->insert(['id' => 3300233, 'states_id' => 33, 'name' => 'Armação dos Búzios']);
		DB::table('cities')->insert(['id' => 3300258, 'states_id' => 33, 'name' => 'Arraial do Cabo']);
		DB::table('cities')->insert(['id' => 3300308, 'states_id' => 33, 'name' => 'Barra do Piraí']);
		DB::table('cities')->insert(['id' => 3300407, 'states_id' => 33, 'name' => 'Barra Mansa']);
		DB::table('cities')->insert(['id' => 3300456, 'states_id' => 33, 'name' => 'Belford Roxo']);
		DB::table('cities')->insert(['id' => 3300506, 'states_id' => 33, 'name' => 'Bom Jardim']);
		DB::table('cities')->insert(['id' => 3300605, 'states_id' => 33, 'name' => 'Bom Jesus do Itabapoana']);
		DB::table('cities')->insert(['id' => 3300704, 'states_id' => 33, 'name' => 'Cabo Frio']);
		DB::table('cities')->insert(['id' => 3300803, 'states_id' => 33, 'name' => 'Cachoeiras de Macacu']);
		DB::table('cities')->insert(['id' => 3300902, 'states_id' => 33, 'name' => 'Cambuci']);
		DB::table('cities')->insert(['id' => 3300936, 'states_id' => 33, 'name' => 'Carapebus']);
		DB::table('cities')->insert(['id' => 3300951, 'states_id' => 33, 'name' => 'Comendador Levy Gasparian']);
		DB::table('cities')->insert(['id' => 3301009, 'states_id' => 33, 'name' => 'Campos dos Goytacazes']);
		DB::table('cities')->insert(['id' => 3301108, 'states_id' => 33, 'name' => 'Cantagalo']);
		DB::table('cities')->insert(['id' => 3301157, 'states_id' => 33, 'name' => 'Cardoso Moreira']);
		DB::table('cities')->insert(['id' => 3301207, 'states_id' => 33, 'name' => 'Carmo']);
		DB::table('cities')->insert(['id' => 3301306, 'states_id' => 33, 'name' => 'Casimiro de Abreu']);
		DB::table('cities')->insert(['id' => 3301405, 'states_id' => 33, 'name' => 'Conceição de Macabu']);
		DB::table('cities')->insert(['id' => 3301504, 'states_id' => 33, 'name' => 'Cordeiro']);
		DB::table('cities')->insert(['id' => 3301603, 'states_id' => 33, 'name' => 'Duas Barras']);
		DB::table('cities')->insert(['id' => 3301702, 'states_id' => 33, 'name' => 'Duque de Caxias']);
		DB::table('cities')->insert(['id' => 3301801, 'states_id' => 33, 'name' => 'Engenheiro Paulo de Frontin']);
		DB::table('cities')->insert(['id' => 3301850, 'states_id' => 33, 'name' => 'Guapimirim']);
		DB::table('cities')->insert(['id' => 3301876, 'states_id' => 33, 'name' => 'Iguaba Grande']);
		DB::table('cities')->insert(['id' => 3301900, 'states_id' => 33, 'name' => 'Itaboraí']);
		DB::table('cities')->insert(['id' => 3302007, 'states_id' => 33, 'name' => 'Itaguaí']);
		DB::table('cities')->insert(['id' => 3302056, 'states_id' => 33, 'name' => 'Italva']);
		DB::table('cities')->insert(['id' => 3302106, 'states_id' => 33, 'name' => 'Itaocara']);
		DB::table('cities')->insert(['id' => 3302205, 'states_id' => 33, 'name' => 'Itaperuna']);
		DB::table('cities')->insert(['id' => 3302254, 'states_id' => 33, 'name' => 'Itatiaia']);
		DB::table('cities')->insert(['id' => 3302270, 'states_id' => 33, 'name' => 'Japeri']);
		DB::table('cities')->insert(['id' => 3302304, 'states_id' => 33, 'name' => 'Laje do Muriaé']);
		DB::table('cities')->insert(['id' => 3302403, 'states_id' => 33, 'name' => 'Macaé']);
		DB::table('cities')->insert(['id' => 3302452, 'states_id' => 33, 'name' => 'Macuco']);
		DB::table('cities')->insert(['id' => 3302502, 'states_id' => 33, 'name' => 'Magé']);
		DB::table('cities')->insert(['id' => 3302601, 'states_id' => 33, 'name' => 'Mangaratiba']);
		DB::table('cities')->insert(['id' => 3302700, 'states_id' => 33, 'name' => 'Maricá']);
		DB::table('cities')->insert(['id' => 3302809, 'states_id' => 33, 'name' => 'Mendes']);
		DB::table('cities')->insert(['id' => 3302858, 'states_id' => 33, 'name' => 'Mesquita']);
		DB::table('cities')->insert(['id' => 3302908, 'states_id' => 33, 'name' => 'Miguel Pereira']);
		DB::table('cities')->insert(['id' => 3303005, 'states_id' => 33, 'name' => 'Miracema']);
		DB::table('cities')->insert(['id' => 3303104, 'states_id' => 33, 'name' => 'Natividade']);
		DB::table('cities')->insert(['id' => 3303203, 'states_id' => 33, 'name' => 'Nilópolis']);
		DB::table('cities')->insert(['id' => 3303302, 'states_id' => 33, 'name' => 'Niterói']);
		DB::table('cities')->insert(['id' => 3303401, 'states_id' => 33, 'name' => 'Nova Friburgo']);
		DB::table('cities')->insert(['id' => 3303500, 'states_id' => 33, 'name' => 'Nova Iguaçu']);
		DB::table('cities')->insert(['id' => 3303609, 'states_id' => 33, 'name' => 'Paracambi']);
		DB::table('cities')->insert(['id' => 3303708, 'states_id' => 33, 'name' => 'Paraíba do Sul']);
		DB::table('cities')->insert(['id' => 3303807, 'states_id' => 33, 'name' => 'Parati']);
		DB::table('cities')->insert(['id' => 3303856, 'states_id' => 33, 'name' => 'Paty do Alferes']);
		DB::table('cities')->insert(['id' => 3303906, 'states_id' => 33, 'name' => 'Petrópolis']);
		DB::table('cities')->insert(['id' => 3303955, 'states_id' => 33, 'name' => 'Pinheiral']);
		DB::table('cities')->insert(['id' => 3304003, 'states_id' => 33, 'name' => 'Piraí']);
		DB::table('cities')->insert(['id' => 3304102, 'states_id' => 33, 'name' => 'Porciúncula']);
		DB::table('cities')->insert(['id' => 3304110, 'states_id' => 33, 'name' => 'Porto Real']);
		DB::table('cities')->insert(['id' => 3304128, 'states_id' => 33, 'name' => 'Quatis']);
		DB::table('cities')->insert(['id' => 3304144, 'states_id' => 33, 'name' => 'Queimados']);
		DB::table('cities')->insert(['id' => 3304151, 'states_id' => 33, 'name' => 'Quissamã']);
		DB::table('cities')->insert(['id' => 3304201, 'states_id' => 33, 'name' => 'Resende']);
		DB::table('cities')->insert(['id' => 3304300, 'states_id' => 33, 'name' => 'Rio Bonito']);
		DB::table('cities')->insert(['id' => 3304409, 'states_id' => 33, 'name' => 'Rio Claro']);
		DB::table('cities')->insert(['id' => 3304508, 'states_id' => 33, 'name' => 'Rio das Flores']);
		DB::table('cities')->insert(['id' => 3304524, 'states_id' => 33, 'name' => 'Rio das Ostras']);
		DB::table('cities')->insert(['id' => 3304557, 'states_id' => 33, 'name' => 'Rio de Janeiro']);
		DB::table('cities')->insert(['id' => 3304607, 'states_id' => 33, 'name' => 'Santa Maria Madalena']);
		DB::table('cities')->insert(['id' => 3304706, 'states_id' => 33, 'name' => 'Santo Antônio de Pádua']);
		DB::table('cities')->insert(['id' => 3304755, 'states_id' => 33, 'name' => 'São Francisco de Itabapoana']);
		DB::table('cities')->insert(['id' => 3304805, 'states_id' => 33, 'name' => 'São Fidélis']);
		DB::table('cities')->insert(['id' => 3304904, 'states_id' => 33, 'name' => 'São Gonçalo']);
		DB::table('cities')->insert(['id' => 3305000, 'states_id' => 33, 'name' => 'São João da Barra']);
		DB::table('cities')->insert(['id' => 3305109, 'states_id' => 33, 'name' => 'São João de Meriti']);
		DB::table('cities')->insert(['id' => 3305133, 'states_id' => 33, 'name' => 'São José de Ubá']);
		DB::table('cities')->insert(['id' => 3305158, 'states_id' => 33, 'name' => 'São José do Vale do Rio Preto']);
		DB::table('cities')->insert(['id' => 3305208, 'states_id' => 33, 'name' => 'São Pedro da Aldeia']);
		DB::table('cities')->insert(['id' => 3305307, 'states_id' => 33, 'name' => 'São Sebastião do Alto']);
		DB::table('cities')->insert(['id' => 3305406, 'states_id' => 33, 'name' => 'Sapucaia']);
		DB::table('cities')->insert(['id' => 3305505, 'states_id' => 33, 'name' => 'Saquarema']);
		DB::table('cities')->insert(['id' => 3305554, 'states_id' => 33, 'name' => 'Seropédica']);
		DB::table('cities')->insert(['id' => 3305604, 'states_id' => 33, 'name' => 'Silva Jardim']);
		DB::table('cities')->insert(['id' => 3305703, 'states_id' => 33, 'name' => 'Sumidouro']);
		DB::table('cities')->insert(['id' => 3305752, 'states_id' => 33, 'name' => 'Tanguá']);
		DB::table('cities')->insert(['id' => 3305802, 'states_id' => 33, 'name' => 'Teresópolis']);
		DB::table('cities')->insert(['id' => 3305901, 'states_id' => 33, 'name' => 'Trajano de Morais']);
		DB::table('cities')->insert(['id' => 3306008, 'states_id' => 33, 'name' => 'Três Rios']);
		DB::table('cities')->insert(['id' => 3306107, 'states_id' => 33, 'name' => 'Valença']);
		DB::table('cities')->insert(['id' => 3306156, 'states_id' => 33, 'name' => 'Varre-Sai']);
		DB::table('cities')->insert(['id' => 3306206, 'states_id' => 33, 'name' => 'Vassouras']);
		DB::table('cities')->insert(['id' => 3306305, 'states_id' => 33, 'name' => 'Volta Redonda']);
    }
}
