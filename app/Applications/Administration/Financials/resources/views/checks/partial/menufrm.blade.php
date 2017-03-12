<div class="row">
    <div class="col-lg-12">
        <legend class="font-weight-300">@if(isset($check)) Editando o cheque <strong class="text-uppercase" id="replacename">#{{$check->id}}</strong> @else Novo Cheque @endif</legend>

        <div class="panel panel-default">
            <div class="panel-body panel-sm">
                <div class="btn-group btn-group-sm" role="group" aria-label="group-financial">
                    <a href="{{url('dashboard/financials/check/')}}" class="btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Voltar</a>
                    <button class="btn btn-default" type="button" name="action" onclick="functionSaveFake('#frmCheck');"><i class="fa fa-save" aria-hidden="true"></i> Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>