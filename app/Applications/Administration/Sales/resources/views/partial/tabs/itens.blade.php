<div class="col-lg-12">
    <div class="panel panel-success">
        <div class="panel-heading panel-heading-sm text-uppercase"><strong>Itens da venda</strong></div>
        <div class="panel-body panel-body-sm">
            <div class="row">
                <div class="form-group margin-bottom-0 col-lg-1">
                    {!! Form::label('prod_id', 'Código') !!}
                    {!! Form::text('prod_id', null, array('id'=>'prod_id', 'class'=>'form-control input-sm', 'placeholder'=>'Código','disabled')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-1">
                    {!! Form::label('amount', 'Qtd') !!}
                    {!! Form::text('amount_item', null, array('id'=>'amount_item', 'class'=>'form-control input-sm', 'placeholder'=>'Qtd', 'onclick'=>'onlyNumber(\'#amount_item\')')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-3">
                    {!! Form::label('product_id', 'Nome do produto') !!}
                    {!! Form::select('product_id', $products, null, array('id'=>'product_id', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-1">
                    {!! Form::label('radial', 'Diam.') !!}
                    {!! Form::text('radial', null, array('id'=>'radial', 'class'=>'form-control input-sm', 'placeholder'=>'Diam.')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-1">
                    {!! Form::label('meters', 'Metragem') !!}
                    {!! Form::text('meters', null, array('id'=>'meters', 'class'=>'form-control input-sm', 'placeholder'=>'Metro')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('meters_type', 'Tipo') !!}
                    {!! Form::select('meters_type', AppHelper::financial_combo_type_meters(), null, array('id'=>'meters_type', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-1">
                    {!! Form::label('price_unit', 'P. Unit.') !!}
                    {!! Form::text('price_unit', null, array('id'=>'price_unit', 'class'=>'form-control input-sm', 'placeholder'=>'Unitário')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('price_total', 'Total') !!}
                    <div class="input-group input-group-sm">
                        {!! Form::text('price_total', null, array('id'=>'price_total', 'class'=>'form-control input-sm', 'placeholder'=>'Preço')) !!}
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" onclick="addItemSale('{{url('dashboard/sale/add-item')}}');"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button>
                      </span>
                    </div>
                </div>
            </div>
        </div>



        <div class="panel-body panel-body-sm">@include('sales::partial.tabs.itenstable')</div>
    </div>
</div>