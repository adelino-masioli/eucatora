<?php

namespace App\Domains\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'order',
        'status_id'
    ];

    public $timestamps = true;

    public function status() {
        return $this->belongsTo('App\Domains\Status\Status', 'status_id');
    }
}
