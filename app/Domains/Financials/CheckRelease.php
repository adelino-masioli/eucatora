<?php

namespace App\Domains\Financials;

use Illuminate\Database\Eloquent\Model;

class CheckRelease extends Model
{
    protected $table = 'check_releases';
    protected $fillable = [
        'id',
        'transaction',
        'description',
        'destination',
        'bank',
        'agency',
        'account',
        'check_number',
        'value',
        'date_final',
        'time',
        'parcel',
        'accountant',
        'document',
        'status'
    ];

    public $timestamps = true;
}
