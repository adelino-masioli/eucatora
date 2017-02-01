<?php

namespace App\Domains\Purchases;
use Illuminate\Database\Eloquent\Model;

class PurchaseStatus extends Model
{
    protected $table = 'purchase_status';
    protected $fillable = array('id', 'status');
    public $timestamps = true;
}
