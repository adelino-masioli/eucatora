<table class="table table-condensed table-responsive table-striped table-hover">
    <thead>
        <tr>
            <th class="col-md-1 text-center text-capitalize"><i class="fa fa-wrench" aria-hidden="true"></i></th>
            <th class="col-md-1 text-center text-capitalize">CÓDIGO</th>
            <th class="col-md-6 text-center text-capitalize">NOME DO PRODUTO</th>
            <th class="col-md-1 text-center text-capitalize">ÁREA</th>
            <th class="col-md-1 text-center text-capitalize">METRO <sup>2</sup></th>
            <th class="col-md-1 text-center text-capitalize">ESTÉREO <sup>2</sup></th>
            <th class="col-md-1 text-center text-capitalize">PREÇO</th>
        </tr>
    </thead>

    <tbody id="showResult">
        @foreach($purchase_itens as $purchase_iten)
        <tr>
            <td class="col-md-1 text-center"><a href="javascript:void(0);" onclick="destroyItemPurchase('{{url('dashboard/purchase/destroy-item/')}}', '{{$purchase_iten->id}}');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            <td class="col-md-1 text-center">{{$purchase_iten->id}}</td>
            <td class="col-md-6 text-left">{{$purchase_iten->product->name}}</td>
            <td class="col-md-1 text-center">{{$purchase_iten->area}}</td>
            <td class="col-md-1 text-center">{{$purchase_iten->meters_square}}</td>
            <td class="col-md-1 text-center">{{$purchase_iten->meters_stereo}}</td>
            <td class="col-md-1 text-center">{{$purchase_iten->price}}</td>
        </tr>
        @endforeach
    </tbody>
</table>