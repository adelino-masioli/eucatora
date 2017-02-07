<?php
namespace App\Domains\States;

class StatesRepository implements StatesRepositoryInterface
{
    public function getAll()
    {
        $states = State::orderBy('name')->get();
        $dataStates = array();
        $dataStates[''] = 'Selecione o estado';
        foreach ($states as $state):
            $dataStates[$state->id] = $state->name;
        endforeach;
        return $dataStates;
    }
}