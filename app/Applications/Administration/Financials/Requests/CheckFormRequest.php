<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 20/10/16
 * Time: 13:56
 */
namespace App\Applications\Administration\Financials\Requests;

use App\Core\Requests\Request;

class CheckFormRequest extends Request
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
            'bank'         => 'required',
            'agency'       => 'required',
            'account'      => 'required',
            'check_number' => 'required',
            'value'        => 'required',
            'date_final'   => 'required',
            'parcel'       => 'required',
            'description'  => 'required',
            'status'       => 'required',
        ];


    }
    public function messages()
    {
        return [
            'bank.required'            => 'Favor informar o campo <b>BANCO!</b>',
            'agency.required'          => 'Favor informar o campo <b>AGÊNCIA!</b>',
            'account.required'         => 'Favor informar o campo <b>CONTA!</b>',
            'check_number.required'    => 'Favor informar o campo <b>NÚMERO DO CHEQUE!</b>',
            'value.required'           => 'Favor informar o campo <b>VALOR!</b>',
            'date_final.required'      => 'Favor informar o campo <b>DATA VENCIMENTO!</b>',
            'parcel.required'          => 'Favor informar o campo <b>PARCELAS!</b>',
            'description.required'     => 'Favor informar o campo <b>DESCRIÇÃO!</b>',
            'status.required'          => 'Favor selecionar o campo <b>STATUS DO LANÇAMENTO!</b>',
        ];
    }


}