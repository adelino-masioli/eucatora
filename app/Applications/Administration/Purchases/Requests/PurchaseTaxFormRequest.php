<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 20/10/16
 * Time: 13:56
 */
namespace App\Applications\Administration\Purchases\Requests;

use App\Core\Requests\Request;

class PurchaseTaxFormRequest extends Request
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
            'description'   => 'required',
            'price'         => 'required',
        ];


    }
    public function messages()
    {
        return [
            'description.required'    => 'Favor informar a <b>DESCRIÇÃO!</b>',
            'price.required'          => 'Favor informar o <b>VALOR!</b>',
        ];
    }


}