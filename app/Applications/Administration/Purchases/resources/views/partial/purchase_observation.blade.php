<div class="col-lg-12">
    <div class="panel panel-success">
        <div class="panel-heading text-uppercase panel-heading-sm"><strong>Proprietário</strong></div>
        <div class="panel-body panel-body-sm">
            <div class="row">
                <div class="form-group form-group-xs margin-bottom-0 col-lg-12">
                    {!! Form::label('access', 'Roteiro de acesso à propriedade') !!}
                    {!! Form::text('access',  null, array('id'=>'access', 'class'=>'form-control input-sm', 'placeholder'=>'Roteiro de acesso à propriedade')) !!}
                </div>
            </div>{{--end access--}}

            <div class="row">
                <div class="form-group form-group-xs margin-bottom-0 col-lg-12">
                    {!! Form::label('observation', 'Observação') !!}
                    {!! Form::textarea('observation',  null, array('id'=>'observation', 'class'=>'form-control input-sm', 'placeholder'=>'Observação', 'rows'=>'3')) !!}
                </div>
            </div>{{--end access--}}

        </div>
    </div>
</div>{{--end observation--}}




