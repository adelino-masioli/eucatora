<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading text-uppercase"><strong>Dados do cliente</strong></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-lg-6">
                    {!! Form::label('name', 'Nome completo do cliente') !!}
                    {!! Form::text('name', null, array('id'=>'name', 'class'=>'form-control', 'placeholder'=>'Informe o nome do cliente','required')) !!}
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('document_type', 'Tipo do documento') !!}
                    <div class="row">
                        <div class="col-lg-12 margin-top-5">
                            <div class="radio radio-inline">
                                <input type="radio" name="document_type" id="document_type_cpf"  value="cpf" onclick="changeMask(1)">
                                <label for="document_type_cpf">CPF</label>
                            </div>
                            <div class="radio radio-inline">
                                <input type="radio" name="document_type" id="document_type_cnpj" value="cnpj" onclick="changeMask(2)">
                                <label for="document_type_cnpj">CNPJ</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    {!! Form::label('document', 'Documento') !!}
                    {!! Form::text('document', null, array('id'=>'document', 'class'=>'form-control', 'placeholder'=>'Informe o documento','required','disabled', 'onclick'=>'changeMaskInput()')) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    {!! Form::label('site', 'Site') !!}
                    {!! Form::text('site', null, array('id'=>'site', 'class'=>'form-control', 'placeholder'=>'Informe o site')) !!}
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('email', 'E-mail') !!}
                    {!! Form::email('email', null, array('id'=>'email', 'class'=>'form-control', 'placeholder'=>'Informe o e-mail','required')) !!}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-2">
                    {!! Form::label('phone', 'Telefone') !!}
                    {!! Form::text('phone', null, array('id'=>'phone', 'class'=>'form-control', 'placeholder'=>'Telefone','required')) !!}
                </div>

                <div class="form-group col-lg-2">
                    {!! Form::label('celullar', 'Celular') !!}
                    {!! Form::text('celullar', null, array('id'=>'celullar', 'class'=>'form-control', 'placeholder'=>'Celular','required')) !!}
                </div>

                <div class="form-group col-lg-2">
                    {!! Form::label('status_id', 'Selecione o status') !!}
                    {!! Form::select('status_id', $status, null, array('id'=>'status_id', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                </div>

                <div class="form-group col-lg-6">
                    {!! Form::label('customer_group_id', 'Grupo de clientes') !!}
                    {!! Form::select('customer_group_id', $customer_groups, null, array('id'=>'customer_group_id', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                </div>
            </div>
        </div>
    </div>
</div>