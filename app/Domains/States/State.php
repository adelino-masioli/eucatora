<?php

namespace App\Domains\States;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    protected $fillable = array('id', 'uf', 'name', 'code_uf_ibge');
    public $timestamps = true;
}
