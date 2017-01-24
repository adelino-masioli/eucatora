<?php

namespace App\Domains\Purchases;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{

    protected $table = 'purchase_itens';
    protected $fillable = [
        'price',
        'area',
        'meters_square',
        'meters_stereo',
        'product_id',
        'purchase_id'
    ];

    public $timestamps = true;

    public function purchase() {
        return $this->belongsTo('App\Domains\Purchases\Purchase', 'purchase_id');
    }
    public function product() {
        return $this->belongsTo('App\Domains\Products\Product', 'product_id');
    }
}
