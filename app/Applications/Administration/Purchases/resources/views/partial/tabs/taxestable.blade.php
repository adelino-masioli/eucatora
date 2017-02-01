<table class="table table-condensed table-responsive table-striped table-hover">
    <thead>
        <tr>
            <th class="col-md-1 text-center text-capitalize"><i class="fa fa-wrench" aria-hidden="true"></i></th>
            <th class="col-md-8 text-center text-capitalize">DESCRIÇÃO DA TAXA E IMPOSTO</th>
            <th class="col-md-1 text-center text-capitalize">PREÇO</th>
        </tr>
    </thead>

    <tbody id="showResultTax">
        @foreach($purchase_taxes as $purchase_tax)
        <tr>
            <td class="col-md-1 text-center"><a href="javascript:void(0);" onclick="destroyTaxePurchase('{{url('dashboard/purchase/destroy-tax/')}}', '{{$purchase_tax->id}}');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            <td class="col-md-8 text-left">{{$purchase_tax->description}}</td>
            <td class="col-md-1 text-center">{{$purchase_tax->price}}</td>
        </tr>
        @endforeach
    </tbody>
</table>