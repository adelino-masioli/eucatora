<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 20/10/16
 * Time: 13:56
 */
namespace App\Applications\Administration\Purchases\Requests;

use App\Core\Requests\Request;

class PurchaseFormRequest extends Request
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
            'denomination'  => 'required',
            'owner_name'    => 'required',
            'explorer_name' => 'required'
        ];


    }
    public function messages()
    {
        return [
            'denomination.required'  => 'Favor informar a <b>DENOMINAÇÃO!</b>',
            'owner_name.required'    => 'Favor informar o <b>NOME DO PROPRIETÁRIO!</b>',
            'explorer_name.required' => 'Favor informar o <b>NOME DO EXPLORADOR!</b>'
        ];
    }


}