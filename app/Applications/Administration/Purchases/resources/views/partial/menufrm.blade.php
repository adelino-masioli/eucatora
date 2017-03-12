<div class="row">
    <div class="col-lg-12">
        <legend class="font-weight-300">@if(isset($purchase)) Editando requerimento <strong class="text-uppercase" id="replacename">#{{$purchase->id}}</strong> @else Novo requerimento de compra @endif</legend>

        <div class="panel panel-default">
            <div class="panel-body panel-sm">
                <div class="btn-group btn-group-sm" role="group" aria-label="group-Purchases">
                    <a href="{{url('dashboard/purchases')}}" class="btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Voltar</a>
                    <button class="btn btn-default" type="button" name="action" onclick="functionSavePurchase('#frmPurchase');"><i class="fa fa-save" aria-hidden="true"></i> Salvar requerimento</button>

                    @if(isset($purchase))
                        <a class="btn btn-default btn-exports" type="button" href="{{url('dashboard/purchase/report-exportpdf')}}/{{$purchase->id}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Exportar PDF</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>