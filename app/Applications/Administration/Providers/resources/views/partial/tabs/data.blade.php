<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading text-uppercase"><strong>Dados do fornecedor</strong></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-lg-6">
                    {!! Form::label('name', 'Nome completo do fornecedor') !!}
                    {!! Form::text('name', null, array('id'=>'name', 'class'=>'form-control', 'placeholder'=>'Informe o nome do fornecedor','required')) !!}
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('document_type', 'Tipo do documento') !!}
                    <div class="row">
                        <div class="col-lg-12 margin-top-5">
                            <div class="radio radio-inline">
                                {!!  Form::radio('document_type', 'cpf', null, array('id'=>'document_type_cpf',  'onclick'=>'changeMask(1)')) !!}
                                <label for="document_type_cpf">CPF</label>
                            </div>
                            <div class="radio radio-inline">
                                {!!  Form::radio('document_type', 'cnpj', null, array('id'=>'document_type_cnpj',  'onclick'=>'changeMask(2)')) !!}

                                <label for="document_type_cnpj">CNPJ</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    {!! Form::label('document', 'Documento') !!}
                    {!! Form::text('document', null, array('id'=>'document', 'class'=>'form-control', 'placeholder'=>'Informe o documento', isset($customer) ? '' : 'disabled', 'onclick'=>'changeMaskInput()')) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    {!! Form::label('site', 'Site') !!}
                    {!! Form::text('site', null, array('id'=>'site', 'class'=>'form-control', 'placeholder'=>'Informe o site')) !!}
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('email', 'E-mail') !!}
                    {!! Form::email('email', null, array('id'=>'email', 'class'=>'form-control', 'placeholder'=>'Informe o e-mail')) !!}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-2">
                    {!! Form::label('phone', 'Telefone') !!}
                    {!! Form::text('phone', null, array('id'=>'phone', 'class'=>'form-control', 'placeholder'=>'Telefone')) !!}
                </div>

                <div class="form-group col-lg-2">
                    {!! Form::label('celullar', 'Celular') !!}
                    {!! Form::text('celullar', null, array('id'=>'celullar', 'class'=>'form-control', 'placeholder'=>'Celular')) !!}
                </div>

                <div class="form-group col-lg-2">
                    {!! Form::label('status_id', 'Selecione o status') !!}
                    {!! Form::select('status_id', $status, null, array('id'=>'status_id', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                </div>

            </div>
        </div>
    </div>
</div>