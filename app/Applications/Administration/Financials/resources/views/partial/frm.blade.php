<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Descrição</a></li>
            <li role="tabprice"><a href="#tabprice" aria-controls="tabprice" role="tab" data-toggle="tab">Valor</a></li>
        </ul>
    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="description">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-uppercase"><strong>Descrição do lançamento</strong></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                {!! Form::label('title', 'Título do lançamento') !!}
                                {!! Form::text('title', null, array('id'=>'name', 'class'=>'form-control', 'placeholder'=>'Informe o título do lançamento','required')) !!}
                            </div>

                            <div class="form-group col-lg-2">
                                {!! Form::label('date_initial', 'Lançamento') !!}
                                <i class="fa fa-exclamation-circle text-info cursor-pointer" aria-hidden="true" data-toggle="popover" data-placement="top" title="Lançamento" data-content="Data do lançamento!"></i>
                                {!! Form::text('date_initial', null, array('id'=>'date_initial', 'class'=>'form-control input_datapicker', 'placeholder'=>'Lançamento','required')) !!}
                            </div>
                            <div class="form-group col-lg-2">
                                {!! Form::label('date_final', 'Vencimento') !!}
                                <i class="fa fa-exclamation-circle text-info cursor-pointer" aria-hidden="true" data-toggle="popover" data-placement="top" title="Vencimento" data-content="Data do vencimento!"></i>
                                {!! Form::text('date_final', null, array('id'=>'date_initial', 'class'=>'form-control input_datapicker', 'placeholder'=>'Vencimento','required')) !!}
                            </div>
                            <div class="form-group col-lg-2">
                                {!! Form::label('date_alert', 'Lembrar-me') !!}
                                <i class="fa fa-exclamation-circle text-info cursor-pointer" aria-hidden="true" data-toggle="popover" data-placement="top" title="Lembrar-me" data-content="Alerta de vencimento!"></i>
                                {!! Form::text('date_alert', null, array('id'=>'date_alert', 'class'=>'form-control input_datapicker', 'placeholder'=>'Lembrar-me','required')) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-4">
                                {!! Form::label('type', 'Selecione o tipo do lançamento') !!}
                                {!! Form::select('type', AppHelper::financial_combo_type(), null, array('id'=>'type', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                            </div>
                            <div class="form-group col-lg-4">
                                {!! Form::label('destination', 'Selecione o destino do lançamento') !!}
                                {!! Form::select('destination', AppHelper::financial_combo_destination(), null, array('id'=>'destination', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                            </div>
                            <div class="form-group col-lg-4">
                                {!! Form::label('status', 'Selecione o status') !!}
                                {!! Form::select('status', AppHelper::financial_combo_status(), null, array('id'=>'status', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-12">
                                {!! Form::label('description', 'Informe a descrição do lançamento') !!}
                                {!! Form::textarea('description', null, array('id'=>'description', 'class'=>'form-control', 'placeholder'=>'Informe a descrição do lançamento', 'rows'=>'3')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div role="tabpanel" class="tab-pane fade" id="tabprice">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-uppercase"><strong>Valor do lançamento</strong></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-lg-3">
                                {!! Form::label('price', 'Valor total a ser pago') !!}
                                {!! Form::text('price', isset($financial) ? AppHelper::money_br($financial->price) : null, array('id'=>'price', 'class'=>'form-control', 'placeholder'=>'Valor', 'required')) !!}
                            </div>
                            <div class="form-group col-lg-3">
                                {!! Form::label('amount', 'Parcelas') !!}
                                <i class="fa fa-exclamation-circle text-info cursor-pointer" aria-hidden="true" data-toggle="popover" data-placement="top" title="Parcelas" data-content="Quantas parcelas?"></i>
                                {!! Form::text('amount', null, array('id'=>'amount', 'class'=>'form-control', 'placeholder'=>'Parcelas', 'required', 'onclick'=>'onlyNumber(\'#amount\')')) !!}
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::label('provider', 'Fornecedor') !!}
                                <i class="fa fa-exclamation-circle text-info cursor-pointer" aria-hidden="true" data-toggle="popover" data-placement="top" title="Fornecedor" data-content="A quem será pago?"></i>
                                {!! Form::text('provider', null, array('id'=>'provider', 'class'=>'form-control', 'placeholder'=>'Fornecedor', 'required')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>