<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading text-uppercase"><strong>Usuário do cliente</strong></div>
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-lg-4">
                    {!! Form::label('user_name', 'Nome completo do usuário') !!}
                    {!! Form::text('user_name', isset($customer) ? $customer->user->name :  null, array('id'=>'user_name', 'class'=>'form-control', 'placeholder'=>'Informe o nome completo do usuário','required')) !!}
                </div>
                <div class="form-group col-lg-4">
                    {!! Form::label('user_email', 'E-mail do usuário') !!}
                    {!! Form::email('user_email', isset($customer) ? $customer->user->email :  null, array('id'=>'user_email', 'class'=>'form-control', 'placeholder'=>'Informe o e-mail do usuário','required')) !!}
                </div>
                <div class="form-group col-lg-4">
                    {!! Form::label('user_password', 'Senha do usuário') !!}
                    {!! Form::text('user_password', null, array('id'=>'user_password', 'class'=>'form-control', 'placeholder'=>'Informe a senha do usuário', isset($customer) ? '' :  'required')) !!}
                </div>
            </div>

        </div>
    </div>
</div>