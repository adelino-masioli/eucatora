<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 20/10/16
 * Time: 13:56
 */
namespace App\Applications\Administration\Products\Requests;

use App\Core\Requests\Request;

class ProductFormRequest extends Request
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
            'name'            => 'required|min:3|unique:products,id,'.$this->input('id'),
            'status_id'       => 'required'
        ];


    }
    public function messages()
    {
        return [
            'name.required'             => 'Favor informar o campo <b>NOME DO PRODUTO!</b>',
            'name.min'                  => 'Favor informar o nome do produto com mínimo <b>3 CARACTERES</b>!',
            'name.unique'               => 'Já existe um produto com este <b>NOME</b>!',
            'status_id.required'        => 'Favor selecionar o <b>STATUS</b>!',
        ];
    }


}