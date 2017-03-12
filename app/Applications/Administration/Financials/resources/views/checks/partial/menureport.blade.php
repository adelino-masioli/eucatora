<div class="row">
    <div class="col-lg-12">
        <legend class="font-weight-300">Gerar relatórios de cheques</legend>

        <div class="panel panel-default">
            <div class="panel-body panel-sm">
                <div class="btn-group btn-group-sm" role="group" aria-label="group-financial">
                    <a href="{{url('dashboard/financials/check')}}" class="btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Voltar</a>
                    <a class="btn btn-default btn-exports hidden" type="button" href="{{url('dashboard/financial/report-exportxls')}}"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar XLS</a>
                    <a class="btn btn-default btn-exports" type="button" href="{{url('dashboard/financial/check/report-exportpdf')}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Exportar PDF</a>
                </div>
            </div>
        </div>
    </div>
</div>