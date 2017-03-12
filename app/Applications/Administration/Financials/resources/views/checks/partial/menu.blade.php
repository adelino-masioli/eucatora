<div class="row">
    <div class="col-lg-12">
        <legend class="font-weight-300">Listagem de cheques</legend>

        <div class="panel panel-default">
            <div class="panel-body panel-sm">
                <div class="btn-group btn-group-sm" role="group" aria-label="group-product">
                    <a href="{{url('dashboard/financial/check/create')}}" class="btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Novo cheque</a>
                    <a href="{{url('dashboard/financial/check/report')}}" class="btn btn-default text-uppercase"><i class="fa fa-print" aria-hidden="true"></i> Relatório de cheques</a>
                    <a href="javascript:void(0);" class="btn btn-default text-uppercase" onclick="funcionRefreshDatatable();"><i class="fa fa-refresh" aria-hidden="true"></i> Atualizar</a>
                    <a href="javascript:void(0);" class="btn btn-default text-uppercase" onclick="showHiden('#frm-filters');"><i class="fa fa-search" aria-hidden="true"></i> Filtros</a>
                </div>
            </div>
        </div>

        <div id="frm-filters" class="well well-sm" style="display: none;">
           <div class="row">
               <form action="" id="search-form">
                   <div class="col-lg-4">
                       <input type="text" class="form-control" name="description"  id="autoname" placeholder="Descrição">
                   </div>
                   <div class="col-lg-4">
                       <input type="text" class="form-control" name="destination"   placeholder="Destino">
                   </div>
                   <div class="col-lg-1">
                       <input type="text" class="form-control input_datapicker" name="date_final"   placeholder="Fim">
                   </div>
                   <div class="col-lg-1">
                       <input type="text" class="form-control" id="price" name="value"  placeholder="Valor">
                   </div>
                   <div class="col-lg-2">
                   <div class="input-group">
                       <select class="form-control" name="status">
                           <option value="">Status</option>
                           <option value="1">Aberto</option>
                           <option value="2">Pago</option>
                           <option value="3">Cancelado</option>
                       </select>
                       <span class="input-group-btn">
                        <button class="btn btn-success" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                      </span>
                   </div>
                   </div>
               </form>
           </div>
        </div>

    </div>
</div>