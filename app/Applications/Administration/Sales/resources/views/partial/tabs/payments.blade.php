<div class="col-lg-12">
    <div class="panel panel-success">
        <div class="panel-heading panel-heading-sm text-uppercase"><strong>Informações de pagamento</strong></div>
        <div class="panel-body panel-body-sm">
            <div class="row">
                <div class="form-group margin-bottom-0 col-lg-5">
                    {!! Form::label('sale_pay_type', 'Forma de pagamento') !!}
                    {!! Form::text('sale_pay_type', null, array('id'=>'sale_pay_type', 'class'=>'form-control input-sm', 'placeholder'=>'Forma de pagamento')) !!}
                </div>

                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('sale_pay_number', 'Parcela') !!}
                    {!! Form::text('sale_pay_number', null, array('id'=>'sale_pay_number', 'class'=>'form-control input-sm', 'placeholder'=>'Parcela', 'onclick'=>'onlyNumber(\'#sale_pay_number\')')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('sale_pay_value', 'Valor') !!}
                    {!! Form::text('sale_pay_value', null, array('id'=>'sale_pay_value', 'class'=>'form-control input-sm', 'placeholder'=>'Valor')) !!}
                </div>

                <div class="form-group margin-bottom-0 col-lg-3">
                    {!! Form::label('sale_pay_date', 'Data do vencimento') !!}
                    <div class="input-group input-group-sm">
                        {!! Form::text('sale_pay_date', null, array('id'=>'sale_pay_date', 'class'=>'form-control input-sm input_datapicker', 'placeholder'=>'Data do vencimento')) !!}
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" onclick="addPaymentSale('{{url('dashboard/sale/add-payment')}}');"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button>
                      </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-body panel-body-sm">@include('sales::partial.tabs.paymentstable')</div>
    </div>
</div>
{{--VARLOR UNITÁRIO * METRAGEM * QTD--}}