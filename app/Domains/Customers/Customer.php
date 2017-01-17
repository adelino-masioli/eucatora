<?php

namespace App\Domains\Customers;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customers';
    protected $fillable = [
        'name',
        'document_type',
        'document',
        'site',
        'email',
        'phone',
        'celullar',
        'zipcode',
        'neighborhood',
        'address',
        'number',
        'complement',
        'state_id',
        'city_id',
        'status_id'
    ];

    public $timestamps = true;


    public function state() {
        return $this->belongsTo('App\Domains\States\State', 'state_id');
    }
    public function city() {
        return $this->belongsTo('App\Domains\Cities\City', 'city_id');
    }
    public function status() {
        return $this->belongsTo('App\Domains\Status\Status', 'status_id');
    }

    public static function getTableColumns() {
        $indice =  \Schema::getColumnListing('customers');

        $t = 8;

        foreach ($indice as $key=>$value){
            if($key == $t){
                echo $key.'-'. $value .'<br/>';
            }
        }


    }
}
