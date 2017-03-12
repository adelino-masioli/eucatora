@extends('administration::base')
@section('body')
    {!! Form::model($check, array('url' => 'dashboard/financial/check/update/', 'id'=> 'frmCheck', 'method'=> 'put', 'data-toggle'=>'validator', 'role'=>'form')) !!}
    @include('financials::checks.partial.menufrmedit')
    <input type="hidden" value="{{url('dashboard/financial/check/destroy')}}" id="pathdestroycheck" name="pathdestroycheck">
    <input type="hidden" name="id" value="{{$check->id}}">
    <input type="hidden" name="transaction" id="transaction" value="{{$check->transaction}}">
    @include('financials::checks.partial.frmcheck')
    {!! Form::close() !!}
@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
    {{HelperJS::clone_content('#name', '#replacename')}}
    {{HelperJS::mask_money('#value')}}
@endpush