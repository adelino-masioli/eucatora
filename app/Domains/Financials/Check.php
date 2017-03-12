<?php

namespace App\Domains\Financials;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $table = 'checks';
    protected $fillable = [
        'id',
        'transaction',
    ];

    public $timestamps = true;
}
