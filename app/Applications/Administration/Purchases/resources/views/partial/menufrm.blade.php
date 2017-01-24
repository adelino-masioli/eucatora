<div class="row">
    <div class="col-lg-12">
        <legend class="font-weight-300">@if(isset($purchase)) Editando a compra <strong class="text-uppercase" id="replacename">#{{$purchase->id}}</strong> @else Nova Compra @endif</legend>

        <div class="panel panel-default">
            <div class="panel-body panel-sm">
                <div class="btn-group btn-group-sm" role="group" aria-label="group-Sales">
                    <a href="{{url('dashboard/Sales')}}" class="btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Voltar</a>
                    <button class="btn btn-default" type="button" name="action" onclick="functionSavePurchase('#frmPurchase');"><i class="fa fa-save" aria-hidden="true"></i> @if(isset($purchase)) Salvar compra @else Salvar e avançar @endif</button>
                </div>
            </div>
        </div>
    </div>
</div>