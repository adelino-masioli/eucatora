<div id="frm-filters" class="well well-sm">
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
                <input type="text" class="form-control" id="price" name="price"  placeholder="Valor">
            </div>

            <div class="col-lg-2">
                {!! Form::select('type', AppHelper::financial_combo_type(), null, array('id'=>'type', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
            </div>

            <div class="col-lg-2">
                {!! Form::select('destination', AppHelper::financial_combo_destination(), null, array('id'=>'destination', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
            </div>

            <div class="col-lg-2">
                <div class="input-group">
                    {!! Form::select('status', AppHelper::financial_combo_status(), null, array('id'=>'status', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="button" onclick="functionReport('#frmFinancial');"><i class="fa fa-search" aria-hidden="true"></i></button>
                      </span>
                </div>
            </div>
        </form>
    </div>
</div>