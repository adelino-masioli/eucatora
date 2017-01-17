<?php

namespace App\Domains\Cities;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = array('id', 'name', 'states_id');
    public $timestamps = true;
}
