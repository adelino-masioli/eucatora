<?php
namespace App\Domains\Cities;

class CitiesRepository implements CitiesRepositoryInterface
{
	public function getAll()
	{
		return City::lists('name', 'id');
	}

	public function get_by_state_id($id)
	{
		return City::select('id', 'name', 'states_id')->where('states_id', '=', $id)->get();
	}
	public function combo_cities_by_state_id($id)
	{
		$cities = City::where('states_id', '=', $id)->get();
		$dataCities = array();
		foreach ($cities as $city):
			$dataCities[$city->id] = $city->name;
		endforeach;
		return $dataCities;
	}
}