<?php

namespace App\Domains\Financials;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    protected $table = 'financials';
    protected $fillable = [
        'id',
        'transaction',
        'title',
        'date_initial',
        'date_final',
        'date_alert',
        'time',
        'amount',
        'price',
        'provider',
        'description',
        'type',
        'destination',
        'status'
    ];

    public $timestamps = true;
}
