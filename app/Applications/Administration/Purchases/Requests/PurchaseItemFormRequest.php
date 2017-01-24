<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 20/10/16
 * Time: 13:56
 */
namespace App\Applications\Administration\Sales\Requests;

use App\Core\Requests\Request;

class PurchaseItemFormRequest extends Request
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
            'area'          => 'required',
            'meters_square' => 'required',
            'meters_stereo' => 'required',
            'price'         => 'required',
        ];


    }
    public function messages()
    {
        return [
            'product_id.required'     => 'Favor informar o <b>PRODUTO!</b>',
            'product_id.exists'       => 'Favor informar o <b>PRODUTO!</b>',
            'area.required'           => 'Favor informar o <b>ÁREA!</b>',
            'meters_square.required'  => 'Favor informar o <b>METRO QUADRADO!</b>',
            'meters_stereo.required'  => 'Favor informar o <b>METRO ESTÉREO!</b>',
            'price.required'          => 'Favor informar o <b>PREÇO!</b>',
        ];
    }


}