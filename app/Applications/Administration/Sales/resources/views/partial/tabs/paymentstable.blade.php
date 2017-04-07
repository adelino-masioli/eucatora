<table class="table table-condensed table-responsive table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th class="col-md-1 text-center text-capitalize"><i class="fa fa-wrench" aria-hidden="true"></i></th>
            <th class="col-md-1 text-center text-capitalize">CÓDIGO</th>
            <th class="col-md-6 text-center text-capitalize">FORMA DE PAGAMENTO</th>
            <th class="col-md-1 text-center text-capitalize">PARCELA</th>
            <th class="col-md-2 text-center text-capitalize">VALOR</th>
            <th class="col-md-1 text-center text-capitalize">VENCIMENTO</th>
        </tr>
    </thead>

    <tbody id="showResultPayments">
        @foreach($sales_payments as $sales_payment)
        <tr>
            <td class="col-md-1 text-center"><a href="javascript:void(0);" onclick="destroySalePayment('{{url('dashboard/sale/destroy-payment/')}}', '{{$sales_payment->id}}');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            <td class="col-md-1 text-center">{{$sales_payment->id}}</td>
            <td class="col-md-6 text-left">{{$sales_payment->sale_pay_type}}</td>
            <td class="col-md-1 text-center">{{$sales_payment->sale_pay_number}}</td>
            <td class="col-md-2 text-right">{{AppHelper::money_br($sales_payment->sale_pay_value)}}</td>
            <td class="col-md-1 text-center">{{AppHelper::date_only_br($sales_payment->sale_pay_date)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>