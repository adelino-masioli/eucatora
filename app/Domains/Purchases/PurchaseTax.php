<?php

namespace App\Domains\Purchases;

use Illuminate\Database\Eloquent\Model;

class PurchaseTax extends Model
{

    protected $table = 'purchase_taxes';
    protected $fillable = [
        'description',
        'price',
        'purchase_id'
    ];

    public $timestamps = true;

    public function purchase() {
        return $this->belongsTo('App\Domains\Purchases\Purchase', 'purchase_id');
    }
}
