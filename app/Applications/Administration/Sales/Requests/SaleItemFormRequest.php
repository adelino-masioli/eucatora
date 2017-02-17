<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 20/10/16
 * Time: 13:56
 */
namespace App\Applications\Administration\Sales\Requests;

use App\Core\Requests\Request;

class SaleItemFormRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id'    => 'required|exists:products,id',
            'amount_item'   => 'required',
            'meters'        => 'required',
            'meters_type'   => 'required',
            'price_unit'    => 'required',
            'price_total'   => 'required'
        ];


    }
    public function messages()
    {
        return [
            'product_id.required'   => 'Favor informar o <b>PRODUTO!</b>',
            'product_id.exists'     => 'Favor informar o <b>PRODUTO!</b>',
            'amount_item.required'  => 'Favor informar a <b>QUANTIDADE!</b>',
            'meters.required'       => 'Favor informar a <b>METRAGEM!</b>',
            'meters_type.required'  => 'Favor informar o <b>TIPO DE METRAGEM!</b>',
            'price_unit.required'   => 'Favor informar o <b>VALOR UNITÁRIO!</b>',
            'price_total.required'  => 'Favor informar o <b>VALOR TOTAL!</b>'
        ];
    }


}