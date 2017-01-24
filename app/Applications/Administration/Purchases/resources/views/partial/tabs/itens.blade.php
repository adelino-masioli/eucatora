<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading text-uppercase"><strong>Itens da compra</strong></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-lg-1">
                    {!! Form::label('prod_id', 'Código') !!}
                    {!! Form::text('prod_id', null, array('id'=>'prod_id', 'class'=>'form-control input-sm', 'placeholder'=>'Código','disabled')) !!}
                </div>
                <div class="form-group col-lg-6">
                    {!! Form::label('product_id', 'Nome do produto') !!}
                    {!! Form::select('product_id', $products, null, array('id'=>'product_id', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                </div>
                <div class="form-group col-lg-1">
                    {!! Form::label('area', 'Área') !!}
                    {!! Form::text('area', null, array('id'=>'area', 'class'=>'form-control input-sm', 'placeholder'=>'Área')) !!}
                </div>
                <div class="form-group col-lg-1">
                    {!! Form::label('meters_square', 'Metro') !!} <sup><strong>2</strong></sup>
                    {!! Form::text('meters_square', null, array('id'=>'meters_square', 'class'=>'form-control input-sm', 'placeholder'=>'Metro')) !!}
                </div>
                <div class="form-group col-lg-1">
                    {!! Form::label('meters_stereo', 'Estereo') !!} <sup><strong>st</strong></sup>
                    {!! Form::text('meters_stereo', null, array('id'=>'meters_stereo', 'class'=>'form-control input-sm', 'placeholder'=>'Estereo')) !!}
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('price', 'Preço') !!}
                    <div class="input-group input-group-sm">
                        {!! Form::text('price', null, array('id'=>'price', 'class'=>'form-control input-sm', 'placeholder'=>'Preço')) !!}
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" onclick="addItemPurchase('{{url('dashboard/purchase/add-item')}}');"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button>
                      </span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="panel panel-success">
        <div class="panel-heading text-uppercase"><strong>Listagem de itens da compra</strong></div>
        <div class="panel-body">@include('purchases::partial.tabs.itenstable')</div>
    </div>
</div>