<div class="row">
    <div class="col-lg-12">
        <legend class="font-weight-300">@if(isset($customer)) Editando o Cliente <strong class="text-uppercase" id="replacename">{{$customer->name}}</strong> @else Novo Cliente @endif</legend>

        <div class="panel panel-default">
            <div class="panel-body panel-sm">
                <div class="btn-group btn-group-sm" role="group" aria-label="group-customer">
                    <a href="{{url('dashboard/customers')}}" class="btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Voltar</a>
                    <button class="btn btn-default" type="button" name="action" onclick="functionSave('#frmCustomer');"><i class="fa fa-save" aria-hidden="true"></i> Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>