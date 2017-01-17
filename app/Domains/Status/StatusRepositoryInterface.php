<?php
namespace App\Domains\Status;

interface StatusRepositoryInterface
{
    public function getAll();
    public function comboStatus();
}