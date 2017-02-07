@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-success">
                <div class="panel-heading text-center"><img src="{{url('build/images/brand_color.png')}}" alt=""></div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           <div class="row">
                               <div class="col-md-12">
                                   <label for="name" class="control-label">Nome completo</label>
                                   <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                   @if ($errors->has('name'))
                                       <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                   @endif
                               </div>
                           </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="email" class="control-label">Informe um e-mail válido</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="password" class="control-label">Informe a senha</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="password-confirm" class="control-label">Confirme a senha</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success col-md-12">CADASTRAR</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
