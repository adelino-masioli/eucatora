<?php

namespace App\Domains\Status;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = array('id', 'status');
    public $timestamps = true;
}
