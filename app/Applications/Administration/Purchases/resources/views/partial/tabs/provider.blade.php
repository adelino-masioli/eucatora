<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading text-uppercase"><strong>Dados do Fornecedor</strong></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-lg-2">
                    {!! Form::label('id_customer', 'Código') !!}
                    {!! Form::text('id_customer', isset($provider) ? $provider->id : null, array('id'=>'id', 'class'=>'form-control input-sm', 'placeholder'=>'ID','disabled')) !!}
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('name', 'Nome do fornecedor') !!}
                    <div class="input-group input-group-sm">
                        {!! Form::select('provider_id', $providers, null, array('id'=>'provider_id', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                        <span class="input-group-btn">
                        <button class="btn btn-success" type="button" onclick="searchProvider('{{url('dashboard/provider/search-id')}}');"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                      </span>
                    </div>
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('phone', 'Telefone') !!}
                    {!! Form::text('phone', isset($provider) ? $provider->phone : null, array('id'=>'phone', 'class'=>'form-control input-sm', 'placeholder'=>'Telefone','disabled')) !!}
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('celullar', 'Celular') !!}
                    {!! Form::text('celullar', isset($provider) ? $provider->celullar : null, array('id'=>'celullar', 'class'=>'form-control input-sm', 'placeholder'=>'Celular','disabled')) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-2">
                    {!! Form::label('zipcode', 'CEP') !!}
                    {!! Form::text('zipcode', isset($provider) ? $provider->zipcode : null, array('id'=>'zipcode', 'class'=>'form-control input-sm', 'placeholder'=>'CEP','disabled')) !!}
                </div>
                <div class="form-group col-lg-4">
                    {!! Form::label('address', 'Endereço') !!}
                    {!! Form::text('address', isset($provider) ? $provider->address : null, array('id'=>'address', 'class'=>'form-control input-sm', 'placeholder'=>'Endereço','disabled')) !!}
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('neighborhood', 'Bairro') !!}
                    {!! Form::text('neighborhood', isset($provider) ? $provider->neighborhood : null, array('id'=>'neighborhood', 'class'=>'form-control input-sm', 'placeholder'=>'Bairro','disabled')) !!}
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('city', 'Cidade') !!}
                    {!! Form::text('city', isset($provider) ? $provider->city->name : null, array('id'=>'city', 'class'=>'form-control input-sm', 'placeholder'=>'Cidade','disabled')) !!}
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('uf', 'Estado') !!}
                    {!! Form::text('uf', isset($provider) ? $provider->state->uf : null, array('id'=>'uf', 'class'=>'form-control input-sm', 'placeholder'=>'Estado','disabled')) !!}
                </div>
            </div>
        </div>
    </div>
</div>