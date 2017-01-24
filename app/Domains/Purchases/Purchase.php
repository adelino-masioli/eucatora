<?php

namespace App\Domains\Purchases;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    protected $table = 'purchases';
    protected $fillable = [
        'transaction',
        'date',
        'time',
        'total_price',
        'total_area',
        'total_meters_square',
        'total_meters_stereo',
        'provider_id',
        'status_id'
    ];

    public $timestamps = true;


    public function provider() {
        return $this->belongsTo('App\Domains\Providers\Provider', 'provider_id');
    }
    public function status() {
        return $this->belongsTo('App\Domains\Status\Status', 'status_id');
    }
}
