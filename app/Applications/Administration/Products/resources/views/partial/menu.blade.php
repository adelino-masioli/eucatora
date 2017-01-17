<div class="row">
    <div class="col-lg-12">
        <legend class="font-weight-300">Listagem de Produtos</legend>

        <div class="panel panel-default">
            <div class="panel-body panel-sm">
                <div class="btn-group btn-group-sm" role="group" aria-label="group-product">
                    <a href="{{url('dashboard/product/create')}}" class="btn btn-success text-uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> Novo produto</a>
                    <a href="javascript:void(0);" class="btn btn-default text-uppercase" onclick="funcionRefreshDatatable();"><i class="fa fa-refresh" aria-hidden="true"></i> Atualizar</a>
                    <a href="javascript:void(0);" class="btn btn-default text-uppercase" onclick="showHiden('#frm-filters');"><i class="fa fa-search" aria-hidden="true"></i> Filtros</a>
                </div>
            </div>
        </div>

        <div id="frm-filters" class="well well-sm" style="display: none;">
           <div class="row">
               <form action="" id="search-form">
                   <div class="col-lg-7">
                       <input type="text" class="form-control" name="name"  id="autoname" placeholder="Informe o nome do produto">
                   </div>
                   <div class="col-lg-1">
                       <input type="text" class="form-control" name="s_order" id="s_order" placeholder="Ordem" onclick="onlyNumber('#s_order');">
                   </div>
                   <div class="col-lg-2">
                       <select class="form-control" name="status_id">
                           <option value="">Status</option>
                           <option value="1">Ativo</option>
                           <option value="2">Inativo</option>
                       </select>
                   </div>
                   <div class="col-lg-2">
                   <div class="input-group">
                       <input type="text" class="form-control input_datapicker" name="updated_at"   placeholder="Alterações">
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