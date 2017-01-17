<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 20/10/16
 * Time: 13:56
 */
namespace App\Applications\Administration\Customers\Requests;

use App\Core\Requests\Request;

class CustomerFormRequest extends Request
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
            'name'               => 'required|min:3|unique:customers,id,'.$this->input('id'),
            'document'           => 'required|unique:customers,id,'.$this->input('id'),
            'email'              => 'required|email|unique:customers,id,'.$this->input('id'),
            'phone'              => 'required',
            'celullar'           => 'required',
            'customer_group_id'  => 'required'
        ];


    }
    public function messages()
    {
        return [
            'name.required'                => 'Favor informar o campo <b>NOME O CLIENTE!</b>',
            'name.min'                     => 'Favor informar o nome do clientes com mínimo <b>3 CARACTERES</b>!',
            'name.unique'                  => 'Já existe um cliente com este <b>NOME</b>!',
            'document.required'            => 'Favor informar o campo <b>DOCUMENTO!</b>',
            'document.unique'              => 'Já existe um documento com este <b>NÚMERO</b>!',
            'email.required'               => 'Favor informar o campo <b>E-MAIL!</b>',
            'email.unique'                 => 'E-mail já <b>CADASTRADO</b>!',
            'phone.required'               => 'Favor informar o campo <b>TELEFONE!</b>',
            'celullar.required'            => 'Favor informar o campo <b>CELULAR!</b>',
            'customer_group_id.required'   => 'Favor selecionar o <b>GRUPO DE CLIENTES!</b>'
        ];
    }


}