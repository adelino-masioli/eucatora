<?php

namespace App\Domains\Sales;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{

    protected $table = 'sale_itens';
    protected $fillable = [
        'amount',
        'price',
        'meters_square',
        'meters_stereo',
        'product_id',
        'sale_id'
    ];

    public $timestamps = true;

    public function sale() {
        return $this->belongsTo('App\Domains\Sales\Sale', 'sale_id');
    }
    public function product() {
        return $this->belongsTo('App\Domains\Products\Product', 'product_id');
    }
}
