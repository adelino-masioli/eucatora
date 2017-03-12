<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-striped table-responsive table-condensed table-hover datatable" id="financial-table">
            <thead>
            <tr>
                <th class="text-center col-lg-1"><i class="fa fa-wrench" aria-hidden="true"></i></th>
                <th class="text-center col-lg-4">BANCO</th>
                <th class="text-center col-lg-1">AGÊNCIA</th>
                <th class="text-center col-lg-1">CONTA</th>
                <th class="text-center col-lg-1">CHEQUE</th>
                <th class="text-center col-lg-1">VALOR</th>
                <th class="text-center col-lg-1">VENCIMENTO</th>
                <th class="text-center col-lg-1">PARCELA</th>
                <th class="text-center col-lg-1">SITUAÇÃO</th>
            </tr>
            </thead>

            <tbody id="showResultChecks">
                @foreach($checks as $check)
                    <tr>
                        <td class="text-center col-lg-1"><a href="javascript:void(0);" class="btn btn-danger btn-xs" onclick="destroyCheckTable('{{url('dashboard/financial/check/destroy')}}', '{{$check->id}}');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        <td class="text-left col-lg-4">{{$check->bank}}</td>
                        <td class="text-center col-lg-1">{{$check->agency}}</td>
                        <td class="text-center col-lg-1">{{$check->account}}</td>
                        <td class="text-center col-lg-1">{{$check->check_number}}</td>
                        <td class="text-right col-lg-1">{{AppHelper::money_br($check->value)}}</td>
                        <td class="text-center col-lg-1">{{AppHelper::date_only_br($check->date_final)}}</td>
                        <td class="text-center col-lg-1">{{$check->parcel}}</td>
                        <td class="text-center col-lg-1">{{AppHelper::financial_status($check->status)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>