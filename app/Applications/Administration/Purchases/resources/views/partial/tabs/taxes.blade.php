<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading text-uppercase"><strong>Taxas e impostos da compra</strong></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-lg-10">
                    {!! Form::label('description', 'Descrição da taxa de imposto') !!}
                    {!! Form::text('description', null, array('id'=>'description_tax', 'class'=>'form-control input-sm', 'placeholder'=>'Informe a descrição da taxa de impostos')) !!}
                </div>
                <div class="form-group col-lg-2">
                    {!! Form::label('price_tax', 'Valor') !!}
                    <div class="input-group input-group-sm">
                        {!! Form::text('price_tax', null, array('id'=>'price_tax', 'class'=>'form-control input-sm', 'placeholder'=>'Valor')) !!}
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" onclick="addTaxePurchase('{{url('dashboard/purchase/add-tax')}}');"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button>
                      </span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="panel panel-success">
        <div class="panel-heading text-uppercase"><strong>Listagem de taxas e impostos</strong></div>
        <div class="panel-body">@include('Sales::partial.tabs.taxestable')</div>
    </div>
</div>