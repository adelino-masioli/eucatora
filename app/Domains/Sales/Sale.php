<?php

namespace App\Domains\Sales;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    protected $table = 'sales';
    protected $fillable = [
        'transaction',
        'date',
        'time',
        'amount',
        'total_price',
        'total_meters_square',
        'total_meters_stereo',
        'description',
        'customer_id',
        'status_id'
    ];

    public $timestamps = true;


    public function provider() {
        return $this->belongsTo('App\Domains\Customers\Customer', 'customer_id');
    }
    public function status() {
        return $this->belongsTo('App\Domains\Purchases\PurchaseStatus', 'status_id');
    }
}
