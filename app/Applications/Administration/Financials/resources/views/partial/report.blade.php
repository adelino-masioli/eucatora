<div class="row">
        <div class="col-lg-12">
            @include('financials::partial.filter.report')

            <div class="panel panel-default">
                <div class="panel-heading text-uppercase"><strong>Relatório financeiro</strong></div>
                <div class="panel-body">

                        <table class="table table-bordered table-striped table-responsive table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center col-lg-5">LANÇAMENTO</th>
                                    <th class="text-center col-lg-1">INICIO</th>
                                    <th class="text-center col-lg-1">FIM</th>
                                    <th class="text-center col-lg-2">VENCIMENTO</th>
                                    <th class="text-center col-lg-1">VALOR</th>
                                    <th class="text-center col-lg-1">TIPO</th>
                                    <th class="text-center col-lg-1">STATUS</th>
                                </tr>
                            </thead>
                            <tbody id="datatable"></tbody>
                        </table>

                        <span class="text-center btn-block" id="noresult"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Nenhum resultado!</span>

                </div>
            </div>
        </div>
</div>