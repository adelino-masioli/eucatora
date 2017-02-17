<table class="table table-condensed table-responsive table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th class="col-md-1 text-center text-capitalize"><i class="fa fa-wrench" aria-hidden="true"></i></th>
            <th class="col-md-1 text-center text-capitalize">CÓDIGO</th>
            <th class="col-md-1 text-center text-capitalize">QTD</th>
            <th class="col-md-5 text-center text-capitalize">DISCRIMINAÇÃO</th>
            <th class="col-md-1 text-center text-capitalize">METRAGEM</th>
            <th class="col-md-1 text-center text-capitalize">TIPO</th>
            <th class="col-md-1 text-center text-capitalize">P.UNIT</th>
            <th class="col-md-1 text-center text-capitalize">TOTAL</th>
        </tr>
    </thead>

    <tbody id="showResult">
        <?php $price_total = null; ?>
        @foreach($sales_itens as $sales_iten)
        <tr>
            <td class="col-md-1 text-center"><a href="javascript:void(0);" onclick="destroyItemSale('{{url('dashboard/sale/destroy-item/')}}', '{{$sales_iten->id}}');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            <td class="col-md-1 text-center">{{$sales_iten->id}}</td>
            <td class="col-md-1 text-center">{{$sales_iten->amount_item}}</td>
            <td class="col-md-5 text-left">{{$sales_iten->product->name}}</td>
            <td class="col-md-1 text-center">{{$sales_iten->meters}}</td>
            <td class="col-md-1 text-center">{{$sales_iten->meters_type}}</td>
            <td class="col-md-1 text-center">{{$sales_iten->price_unit}}</td>
            <td class="col-md-1 text-right">{{$sales_iten->price_total}}</td>
        </tr>

        <?php $price_total += $sales_iten->price_total; ?>
        @endforeach
    </tbody>


    <tfoot>
        <tr>
            <th colspan="5" class="col-md-1 text-right text-capitalize"></th>
            <th class="col-md-1 text-right text-capitalize">SUBTOTAL</th>
            <th colspan="2"  class="col-md-1 text-right text-capitalize" id="tbl_subtotal">{{$price_total ? AppHelper::money_br($price_total) : '0.00'}}</th>
        </tr>

        <tr>
            <th colspan="5" class="col-md-1 text-right text-capitalize"></th>
            <th class="col-md-1 text-right text-capitalize"><p style="position:relative; top: 6px;">FRETE</p></th>
            <th colspan="2" class="col-md-1 text-right text-capitalize">
                <div class="row">
                    <div class="form-group col-lg-12" style="margin-bottom: 0px!important;">
                        <div class="input-group input-group-sm">
                            {!! Form::text('price_shipp', null, array('id'=>'price_shipp', 'class'=>'form-control input-sm text-right', 'placeholder'=>'Frete')) !!}
                            <span class="input-group-btn">
                            <button class="btn btn-info" type="button" onclick="addShipping('{{url('dashboard/sale/updateshipp')}}');"><i class="fa fa-save" aria-hidden="true"></i></button>
                      </span>
                        </div>
                    </div>
                </div>
            </th>
        </tr>

        <tr>
            <th colspan="5" class="col-md-1 text-right text-capitalize"></th>
            <th class="col-md-1 text-right text-capitalize">TOTAL</th>
            <th colspan="2"  class="col-md-1 text-right text-capitalize" id="tbl_total">{{$price_total ? AppHelper::money_br($price_total - $sale->price_shipp) : '0.00'}}</th>
        </tr>
    </tfoot>
</table>