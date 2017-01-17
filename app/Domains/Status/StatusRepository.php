<?php
namespace App\Domains\Status;

class StatusRepository implements StatusRepositoryInterface
{
    public function getAll()
    {
        return Status::lists('status', 'id');
    }

    public function comboStatus()
    {
        $status = Status::all();
        $data = array();
        $data[''] = 'Selecione';
        foreach ($status as $status):
            $data[$status->id] = $status->status;
        endforeach;
        return $data;
    }
}