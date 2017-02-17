<div class="row">
    <div class="col-lg-12">
        <legend class="font-weight-300">Listagem de Pedidos</legend>

        <div class="panel panel-default">
            <div class="panel-body panel-sm">
                <div class="btn-group btn-group-sm" role="group" aria-label="group-customer_group">
                    <a href="{{url('dashboard/sale/create')}}" class="btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Novo pedido</a>
                    <a href="javascript:void(0);" class="btn btn-default text-uppercase" onclick="funcionRefreshDatatable();"><i class="fa fa-refresh" aria-hidden="true"></i> Atualizar</a>
                    <a href="javascript:void(0);" class="btn btn-default text-uppercase" onclick="showHiden('#frm-filters');"><i class="fa fa-search" aria-hidden="true"></i> Filtros</a>
                </div>
            </div>
        </div>

        <div id="frm-filters" class="well well-sm" style="display: none;">
           <div class="row">
               <form action="" id="search-form">
                   <div class="col-lg-2">
                       <input type="text" class="form-control" name="id" id="id" placeholder="Código" onclick="onlyNumber('#id');">
                   </div>
                   <div class="col-lg-4">
                       <input type="text" class="form-control" name="name"  id="autoname" placeholder="Informe o nome do cliente">
                   </div>

                   <div class="col-lg-2">
                       <input type="text" class="form-control input_datapicker" name="date_initial"  placeholder="Data inicial">
                   </div>

                   <div class="col-lg-2">
                       <input type="text" class="form-control input_datapicker" name="date_end"  placeholder="Data final">
                   </div>

                   <div class="col-lg-2">
                   <div class="input-group">
                       <select class="form-control" name="status_id">
                           <option value="">Status</option>
                           <option value="1">Ativo</option>
                           <option value="2">Inativo</option>
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