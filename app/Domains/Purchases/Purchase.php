<?php

namespace App\Domains\Purchases;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    protected $table = 'purchases';
    protected $fillable = [
        'transaction',
        'denomination',
        'total_area',
        'incra',
        'register_number',
        'county',
        'book',
        'sheet',
        'city',
        'zipcode',
        'cood_geo_lat',
        'cood_geo_long',
        'mi',
        'plan_utm_lat',
        'plan_utm_long',
        'datum',
        'owner_name',
        'owner_cpf_cnpj',
        'owner_address',
        'owner_neig',
        'owner_city',
        'owner_zipcode',
        'explorer_name',
        'explorer_cpf_cnpj',
        'explorer_ief',
        'explorer_category',
        'explorer_address',
        'explorer_neig',
        'explorer_city',
        'explorer_zipcode',
        'explorer_phone',
        'exploration_area',
        'exploration_n_tree',
        'exploration_dap',
        'exploration_alt',
        'exploration_age',
        'exploration_rotation',
        'exploration_spacing',
        'exploration_species',
        'exploration_period',
        'exploration_qtd_oven',
        'exploration_capacity',
        'exploration_destination',
        'exploration_type',
        'exploration_wood_shoring',
        'exploration_wood_scaffolding',
        'exploration_wood_moiroes',
        'exploration_wood_firewood',
        'exploration_wood_sawmill_logs',
        'exploration_wood_sawmill_tulls',
        'exploration_wood_cellulose',
        'exploration_wood_other',
        'exploration_valume_eucalipto',
        'exploration_valume_pinus',
        'exploration_valume_other',
        'access',
        'observation',
        'date',
        'time',
        'status_id'
    ];

    public $timestamps = true;

    public function status() {
        return $this->belongsTo('App\Domains\Purchases\PurchaseStatus', 'status_id');
    }
}
