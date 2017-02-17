<div class="row">
    <div class="col-lg-12">
        <legend class="font-weight-300">@if(isset($sale)) Editando o pedido <strong class="text-uppercase" id="replacename">N&#176;: {{$sale->id}}</strong> @else Novo pedido @endif</legend>

        <div class="panel panel-default">
            <div class="panel-body panel-sm">
                <div class="btn-group btn-group-sm" role="group" aria-label="group-Sales">
                    <a href="{{url('dashboard/sales')}}" class="btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Voltar</a>
                    <button class="btn btn-default" type="button" name="action" onclick="functionSavePurchase('#frmSale');"><i class="fa fa-save" aria-hidden="true"></i> @if(isset($sale)) Salvar venda @else Salvar e avançar @endif</button>
                </div>
            </div>
        </div>
    </div>
</div>