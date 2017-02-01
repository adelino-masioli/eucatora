<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading text-uppercase"><strong>Dados do Cliente</strong></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-lg-2">
                    {!! Form::label('id_customer', 'Código') !!}
                    {!! Form::text('id_customer', isset($customer) ? $customer->id : null, array('id'=>'id', 'class'=>'form-control input-sm', 'placeholder'=>'ID','disabled')) !!}
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('name', 'Nome do cliente') !!}
                    <div class="input-group input-group-sm">
                        {!! Form::select('customer_id', $customers, null, array('id'=>'provider_id', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                        <span class="input-group-btn">
                        <button class="btn btn-success" type="button" onclick="searchProvider('{{url('dashboard/customer/search-id')}}');"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                      </span>
                    </div>
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('phone', 'Telefone') !!}
                    {!! Form::text('phone', isset($customer) ? $customer->phone : null, array('id'=>'phone', 'class'=>'form-control input-sm', 'placeholder'=>'Telefone','disabled')) !!}
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('celullar', 'Celular') !!}
                    {!! Form::text('celullar', isset($customer) ? $customer->celullar : null, array('id'=>'celullar', 'class'=>'form-control input-sm', 'placeholder'=>'Celular','disabled')) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-2">
                    {!! Form::label('zipcode', 'CEP') !!}
                    {!! Form::text('zipcode', isset($customer) ? $customer->zipcode : null, array('id'=>'zipcode', 'class'=>'form-control input-sm', 'placeholder'=>'CEP','disabled')) !!}
                </div>
                <div class="form-group col-lg-4">
                    {!! Form::label('address', 'Endereço') !!}
                    {!! Form::text('address', isset($customer) ? $customer->address : null, array('id'=>'address', 'class'=>'form-control input-sm', 'placeholder'=>'Endereço','disabled')) !!}
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('neighborhood', 'Bairro') !!}
                    {!! Form::text('neighborhood', isset($customer) ? $customer->neighborhood : null, array('id'=>'neighborhood', 'class'=>'form-control input-sm', 'placeholder'=>'Bairro','disabled')) !!}
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('city', 'Cidade') !!}
                    {!! Form::text('city', isset($customer) ? $customer->city->name : null, array('id'=>'city', 'class'=>'form-control input-sm', 'placeholder'=>'Cidade','disabled')) !!}
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('uf', 'Estado') !!}
                    {!! Form::text('uf', isset($customer) ? $customer->state->uf : null, array('id'=>'uf', 'class'=>'form-control input-sm', 'placeholder'=>'Estado','disabled')) !!}
                </div>
            </div>
        </div>
    </div>
</div>