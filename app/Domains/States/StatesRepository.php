<?php
namespace App\Domains\States;

class StatesRepository implements StatesRepositoryInterface
{
    public function getAll()
    {
        $states = States::orderBy('name')->get();
        $dataStates = array();
        $dataStates['0'] = 'Selecione o estado';
        foreach ($states as $state):
            $dataStates[$state->id] = $state->name;
        endforeach;
        return $dataStates;
    }
}