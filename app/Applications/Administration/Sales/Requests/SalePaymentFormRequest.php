<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 20/10/16
 * Time: 13:56
 */
namespace App\Applications\Administration\Sales\Requests;

use App\Core\Requests\Request;

class SalePaymentFormRequest extends Request
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
            'sale_pay_type'   => 'required',
            'sale_pay_value'  => 'required',
            'sale_pay_date'   => 'required'
        ];


    }
    public function messages()
    {
        return [
            'sale_pay_type.required'   => 'Favor informar a <b>FORMA DE PAGAMENTO!</b>',
            'sale_pay_value.required'  => 'Favor informar o <b>VALOR!</b>',
            'sale_pay_date.required'   => 'Favor informar a <b>DATA!</b>',

        ];
    }


}