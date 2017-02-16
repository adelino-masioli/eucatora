<div class="col-lg-12">
    <div class="panel panel-success">
        <div class="panel-heading text-uppercase panel-heading-sm"><strong>Explorador</strong></div>
        <div class="panel-body panel-body-sm">
            <div class="row">
                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                    {!! Form::label('explorer_name', 'Nome do explorador') !!}
                    {!! Form::text('explorer_name',  null, array('id'=>'explorer_name', 'class'=>'form-control input-sm', 'placeholder'=>'Nome do explorador')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('explorer_cpf_cnpj', 'CPF/CNPJ') !!}
                    {!! Form::text('explorer_cpf_cnpj',  null, array('id'=>'explorer_cpf_cnpj', 'class'=>'form-control input-sm', 'placeholder'=>'CPF/CNPJ')) !!}
                </div>

                <div class="form-group form-group-xs margin-bottom-0 col-lg-3">
                    {!! Form::label('explorer_ief', 'Registro IEF') !!}
                    {!! Form::text('explorer_ief',  null, array('id'=>'explorer_ief', 'class'=>'form-control input-sm', 'placeholder'=>'Nome do explorador')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-3">
                    {!! Form::label('explorer_category', 'Categoria') !!}
                    {!! Form::text('explorer_category',  null, array('id'=>'explorer_category', 'class'=>'form-control input-sm', 'placeholder'=>'Categoria')) !!}
                </div>
            </div>{{--end data--}}


            <div class="row">
                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                    {!! Form::label('explorer_address', 'Endereço') !!}
                    {!! Form::text('explorer_address',  null, array('id'=>'explorer_address', 'class'=>'form-control input-sm', 'placeholder'=>'Endereço')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('explorer_neig', 'Bairro') !!}
                    {!! Form::text('explorer_neig',  null, array('id'=>'explorer_neig', 'class'=>'form-control input-sm', 'placeholder'=>'Bairro')) !!}
                </div>

                <div class="form-group form-group-xs margin-bottom-0 col-lg-3">
                    {!! Form::label('explorer_city', 'Município') !!}
                    {!! Form::text('explorer_city',  null, array('id'=>'explorer_city', 'class'=>'form-control input-sm', 'placeholder'=>'Município')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-1">
                    {!! Form::label('explorer_zipcode', 'CEP') !!}
                    {!! Form::text('explorer_zipcode',  null, array('id'=>'explorer_zipcode', 'class'=>'form-control input-sm', 'placeholder'=>'CEP', 'onclick'=>'onlyNumber(\'#explorer_cep\')')) !!}
                </div>

                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('explorer_phone', 'Telefone') !!}
                    {!! Form::text('explorer_phone',  null, array('id'=>'explorer_phone', 'class'=>'form-control input-sm', 'placeholder'=>'Telefone')) !!}
                </div>
            </div>{{--end address--}}

        </div>
    </div>
</div>{{--end explorer--}}




