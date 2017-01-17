<div class="row">
    <div class="col-lg-12">
        <legend class="font-weight-300">@if(isset($product)) Editando o produto <strong class="text-uppercase" id="replacename">{{$product->name}}</strong> @else Novo Produto @endif</legend>

        <div class="panel panel-default">
            <div class="panel-body panel-sm">
                <div class="btn-group btn-group-sm" role="group" aria-label="group-product">
                    <a href="{{url('dashboard/products')}}" class="btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Voltar</a>
                    <button class="btn btn-default" type="button" name="action" onclick="functionSave('#frmProduct');"><i class="fa fa-save" aria-hidden="true"></i> Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>