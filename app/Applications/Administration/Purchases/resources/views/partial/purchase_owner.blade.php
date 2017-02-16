<div class="col-lg-12">
    <div class="panel panel-success">
        <div class="panel-heading text-uppercase panel-heading-sm"><strong>Proprietário</strong></div>
        <div class="panel-body panel-body-sm">
            <div class="row">
                <div class="form-group form-group-xs margin-bottom-0 col-lg-10">
                    {!! Form::label('owner_name', 'Nome') !!}
                    {!! Form::text('owner_name',  null, array('id'=>'owner_name', 'class'=>'form-control input-sm', 'placeholder'=>'Nome do proprietário')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('owner_cpf_cnpj', 'CPF/CNPJ') !!}
                    {!! Form::text('owner_cpf_cnpj',  null, array('id'=>'owner_cpf_cnpj', 'class'=>'form-control input-sm', 'placeholder'=>'CPF/CNPJ')) !!}
                </div>
            </div>{{--end data--}}


            <div class="row">
                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                    {!! Form::label('owner_address', 'Endereço') !!}
                    {!! Form::text('owner_address',  null, array('id'=>'owner_address', 'class'=>'form-control input-sm', 'placeholder'=>'Endereço')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('owner_neig', 'Bairro') !!}
                    {!! Form::text('owner_neig',  null, array('id'=>'owner_neig', 'class'=>'form-control input-sm', 'placeholder'=>'Bairro')) !!}
                </div>

                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                    {!! Form::label('owner_city', 'Município') !!}
                    {!! Form::text('owner_city',  null, array('id'=>'owner_city', 'class'=>'form-control input-sm', 'placeholder'=>'Município')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('owner_zipcode', 'CEP') !!}
                    {!! Form::text('owner_zipcode',  null, array('id'=>'owner_zipcode', 'class'=>'form-control input-sm', 'placeholder'=>'CEP', 'onclick'=>'onlyNumber(\'#owner_cep\')')) !!}
                </div>
            </div>{{--end address--}}

        </div>
    </div>
</div>{{--end owner--}}




