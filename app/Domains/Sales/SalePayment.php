<?php

namespace App\Domains\Sales;

use Illuminate\Database\Eloquent\Model;

class SalePayment extends Model
{

    protected $table = 'sale_payments';
    protected $fillable = [
        'sale_pay_type',
        'sale_pay_number',
        'sale_pay_value',
        'sale_pay_date',
        'sale_id'
    ];

    public $timestamps = true;

    public function sale() {
        return $this->belongsTo('App\Domains\Sales\Sale', 'sale_id');
    }
}
