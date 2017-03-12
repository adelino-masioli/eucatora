<div class="row">
    <div class="col-lg-12">
        <legend class="font-weight-300">@if(isset($financial)) Editando o pagamento <strong class="text-uppercase" id="replacename">{{$financial->title}}</strong> @else Novo Pagamento @endif</legend>

        <div class="panel panel-default">
            <div class="panel-body panel-sm">
                <div class="btn-group btn-group-sm" role="group" aria-label="group-financial">
                    <a href="{{url('dashboard/financials')}}" class="btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Voltar</a>
                    <button class="btn btn-default" type="button" name="action" onclick="functionSave('#frmFinancial');"><i class="fa fa-save" aria-hidden="true"></i> Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>