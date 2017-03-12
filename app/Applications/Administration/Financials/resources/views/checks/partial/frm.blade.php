<div class="row">
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-uppercase panel-heading-sm"><strong>Descrição do(s) cheque(s)</strong></div>
                    <div class="panel-body panel-body-sm">
                        <div class="row">
                            <div class="form-group form-group-xs margin-bottom-0 col-lg-2">
                                {!! Form::label('bank', 'Banco') !!}
                                {!! Form::text('bank', null, array('id'=>'bank', 'class'=>'form-control input-sm', 'placeholder'=>'Banco','required')) !!}
                            </div>
                            <div class="form-group form-group-xs margin-bottom-0 col-lg-1">
                                {!! Form::label('agency', 'Agência') !!}
                                {!! Form::text('agency', null, array('id'=>'agency', 'class'=>'form-control input-sm', 'placeholder'=>'Agência','required')) !!}
                            </div>
                            <div class="form-group form-group-xs margin-bottom-0 col-lg-1">
                                {!! Form::label('account', 'Conta') !!}
                                {!! Form::text('account', null, array('id'=>'account', 'class'=>'form-control input-sm', 'placeholder'=>'Conta','required')) !!}
                            </div>
                            <div class="form-group form-group-xs margin-bottom-0 col-lg-2">
                                {!! Form::label('check_number', 'N&#186; Cheque') !!}
                                {!! Form::text('check_number', null, array('id'=>'check_number', 'class'=>'form-control input-sm', 'placeholder'=>'Cheque','required')) !!}
                            </div>
                            <div class="form-group form-group-xs margin-bottom-0 col-lg-2">
                                {!! Form::label('value', 'Valor') !!}
                                {!! Form::text('value', null,  array('id'=>'value', 'class'=>'form-control input-sm', 'placeholder'=>'Valor','required')) !!}
                            </div>
                            <div class="form-group form-group-xs margin-bottom-0 col-lg-2">
                                {!! Form::label('date_final', 'Vencimento') !!}
                                <i class="fa fa-exclamation-circle text-info cursor-pointer" aria-hidden="true" data-toggle="popover" data-placement="top" title="Vencimento" data-content="Data do vencimento!"></i>
                                {!! Form::text('date_final', isset($financial) ? AppHelper::date_only_br($financial->date_final) : null, array('id'=>'date_final', 'class'=>'form-control input-sm input_datapicker', 'placeholder'=>'Vencimento','required')) !!}
                            </div>
                            <div class="form-group form-group-xs margin-bottom-0 col-lg-2">
                                {!! Form::label('parcel', 'Parcelas') !!}
                                {!! Form::text('parcel', null,  array('id'=>'parcel', 'class'=>'form-control input-sm', 'placeholder'=>'Parcelas','required', 'onclick'=>'onlyNumber(\'#parcel\')')) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                                {!! Form::label('description', 'Descrição') !!}
                                {!! Form::text('description', null, array('id'=>'description', 'class'=>'form-control input-sm', 'placeholder'=>'Descrição','required')) !!}
                            </div>
                            <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                                {!! Form::label('accountant', 'Favorecido') !!}
                                {!! Form::text('accountant', null, array('id'=>'accountant', 'class'=>'form-control input-sm', 'placeholder'=>'Favorecido')) !!}
                            </div>

                            <div class="form-group col-lg-2">
                                {!! Form::label('document', 'CPF/CNPJ') !!}
                                {!! Form::text('document', null,  array('id'=>'document', 'class'=>'form-control input-sm', 'placeholder'=>'CPF/CNPJ')) !!}
                            </div>

                            <div class="form-group form-group-xs margin-bottom-0 col-lg-2">
                                {!! Form::label('status', 'Selecione o status') !!}
                                <div class="input-group input-group-sm">
                                    {!! Form::select('status', AppHelper::financial_combo_status(), null, array('id'=>'status', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="button" onclick="addCheck('{{url('/dashboard/financial/check/add')}}');">Adicionar!</button>
                                    </span>
                                </div><!-- /input-group -->
                            </div>

                        </div>

                    </div>
                </div>



                <div class="panel panel-default">
                    <div class="panel-heading text-uppercase panel-heading-sm"><strong>Cheques lançados</strong></div>
                    <div class="panel-body panel-body-sm">@include('financials::checks.partial.table')</div>
                </div>
            </div>
        </div>

    </div>
</div>