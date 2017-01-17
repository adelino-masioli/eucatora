<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Descrição</a></li>
        </ul>
    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="description">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-uppercase"><strong>Descrição do produto</strong></div>
                    <div class="panel-body">
                        <div class="form-group">
                            {!! Form::label('name', 'Nome do produto') !!}
                            {!! Form::text('name', null, array('id'=>'name', 'class'=>'form-control', 'placeholder'=>'Informe o nome do produto','required')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Descrição do produto') !!}
                            {!! Form::textarea('description', null, array('id'=>'description', 'class'=>'form-control', 'placeholder'=>'Informe uma descrição para o produto', 'rows'=>'4')) !!}
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-2">
                                {!! Form::label('order', 'Ordem') !!}
                                {!! Form::text('order', null, array('id'=>'order', 'class'=>'form-control', 'onclick'=>'onlyNumber(\'#order\')')) !!}
                            </div>

                            <div class="form-group col-lg-2">
                                {!! Form::label('status_id', 'Selecione o status') !!}
                                {!! Form::select('status_id', $status, null, array('id'=>'status_id', 'class'=>'form-control selectpicker', 'data-container'=>'body', 'required')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>