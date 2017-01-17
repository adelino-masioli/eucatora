
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading text-uppercase"><strong>Endereço fornecedor</strong></div>
        <div class="panel-body" id="fields_address">
            <div class="row">
                <div class="form-group col-lg-2">
                    {!! Form::label('zipcode', 'CEP') !!}
                    <div class="input-group">
                        {!! Form::text('zipcode', null, array('id'=>'zipcode', 'class'=>'form-control', 'placeholder'=>'CEP')) !!}
                        <span class="input-group-btn">
                          <button class="btn btn-primary" onclick="searchCEP('{{url('dashboard/get_zipcode')}}', '#zipcode');" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </span>
                    </div><!-- /input-group -->
                </div>
                <div class="form-group col-lg-4">
                    {!! Form::label('neighborhood', 'Bairro') !!}
                    {!! Form::text('neighborhood', null, array('id'=>'neighborhood', 'class'=>'form-control', 'placeholder'=>'Informe o bairro')) !!}
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('address', 'Rua') !!}
                    {!! Form::text('address', null, array('id'=>'address', 'class'=>'form-control', 'placeholder'=>'Informe a rua')) !!}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-2">
                    {!! Form::label('number', 'Número') !!}
                    {!! Form::text('number', null, array('id'=>'number', 'class'=>'form-control', 'placeholder'=>'Informe o número')) !!}
                </div>
                <div class="form-group col-lg-4">
                    {!! Form::label('complement', 'Complemento') !!}
                    {!! Form::text('complement', null, array('id'=>'complement', 'class'=>'form-control', 'placeholder'=>'Informe o complemebto')) !!}
                </div>
                <div class="form-group col-lg-3">
                    {!! Form::label('state_id', 'Estado') !!}
                    {!! Form::select('state_id', $states, null, array('id'=>'state_id', 'class'=>'form-control')) !!}
                </div>
                <div class="form-group col-lg-3">
                    {!! Form::label('city_id', 'Cidade') !!}
                    {!! Form::select('city_id', isset($cities) ? $cities : ['' => 'Selecione o estado'], null, array('id'=>'city_id', 'class'=>'form-control')) !!}
                </div>
            </div>
        </div>
    </div>
</div>