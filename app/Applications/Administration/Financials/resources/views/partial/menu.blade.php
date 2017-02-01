<div class="row">
    <div class="col-lg-12">
        <legend class="font-weight-300">Listagem de Lançamentos Financeiros</legend>

        <div class="panel panel-default">
            <div class="panel-body panel-sm">
                <div class="btn-group btn-group-sm" role="group" aria-label="group-product">
                    <a href="{{url('dashboard/financial/create')}}" class="btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Novo lançamento</a>
                    <a href="javascript:void(0);" class="btn btn-default text-uppercase" onclick="funcionRefreshDatatable();"><i class="fa fa-refresh" aria-hidden="true"></i> Atualizar</a>
                    <a href="javascript:void(0);" class="btn btn-default text-uppercase" onclick="showHiden('#frm-filters');"><i class="fa fa-search" aria-hidden="true"></i> Filtros</a>
                </div>
            </div>
        </div>

        <div id="frm-filters" class="well well-sm" style="display: none;">
           <div class="row">
               <form action="" id="search-form">
                   <div class="col-lg-3">
                       <input type="text" class="form-control" name="title"  id="autoname" placeholder="Descrição do lançamento">
                   </div>
                   <div class="col-lg-1">
                       <input type="text" class="form-control input_datapicker" name="date_initial"   placeholder="Início">
                   </div>
                   <div class="col-lg-1">
                       <input type="text" class="form-control input_datapicker" name="date_final"   placeholder="Fim">
                   </div>
                   <div class="col-lg-1">
                       <input type="text" class="form-control input_datapicker" name="date_alert"   placeholder="Alerta">
                   </div>
                   <div class="col-lg-1">
                       <input type="text" class="form-control" id="price" name="price"  placeholder="Valor">
                   </div>


                   <div class="col-lg-1">
                       <select class="form-control" name="type">
                           <option value="">Tipo</option>
                           <option value="1">Entrada</option>
                           <option value="2">Saída</option>
                       </select>
                   </div>

                   <div class="col-lg-2">
                       <select class="form-control" name="destination">
                           <option value="">Destino</option>
                           <option value="1">Salários</option>
                           <option value="2">Caminhão</option>
                           <option value="3">Diversos</option>
                       </select>
                   </div>

                   <div class="col-lg-2">
                   <div class="input-group">
                       <select class="form-control" name="status">
                           <option value="">Status</option>
                           <option value="1">Aberto</option>
                           <option value="2">Pago</option>
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