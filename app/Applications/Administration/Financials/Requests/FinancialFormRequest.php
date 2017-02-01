<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 20/10/16
 * Time: 13:56
 */
namespace App\Applications\Administration\Financials\Requests;

use App\Core\Requests\Request;

class FinancialFormRequest extends Request
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
            'title'        => 'required|min:3',
            'date_initial' => 'required',
            'date_final'   => 'required',
            'date_alert'   => 'required',
            'price'        => 'required',
            'amount'       => 'required',
            'provider'     => 'required',
            'type'         => 'required',
            'destination'  => 'required',
            'status'       => 'required',
        ];


    }
    public function messages()
    {
        return [
            'title.required'           => 'Favor informar o campo <b>DESCRIÇÃO DO LANÇAMENTO!</b>',
            'title.min'                => 'Favor informar o descrição do lançamento mínimo <b>3 CARACTERES</b>!',
            'date_initial.required'    => 'Favor informar o campo <b>DATA LANÇAMENTO!</b>',
            'date_final.required'      => 'Favor informar o campo <b>DATA VENCIMENTO!</b>',
            'date_alert.required'      => 'Favor informar o campo <b>DATA ALERTA!</b>',
            'price.required'           => 'Favor informar o campo <b>PREÇO!</b>',
            'amount.required'          => 'Favor informar o campo <b>PARCELAS!</b>',
            'provider.required'        => 'Favor informar o campo <b>FORNECEDOR!</b>',
            'type.required'            => 'Favor selecionar o campo <b>TIPO DE LANÇAMENTO!</b>',
            'destination.required'     => 'Favor selecionar o campo <b>DESTINO DO LANÇAMENTO!</b>',
            'status.required'          => 'Favor selecionar o campo <b>STATUS DO LANÇAMENTO!</b>',
        ];
    }


}