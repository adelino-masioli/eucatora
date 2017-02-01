@extends('administration::base')
@section('body')
    {!! Form::model($financial, array('url' => 'dashboard/financial/update/', 'id'=> 'frmFinancial', 'method'=> 'put', 'data-toggle'=>'validator', 'role'=>'form')) !!}
    @include('financials::partial.menufrm')
    <input type="hidden" value="#divimagehide" id="divshow" name="divshow">
    <input type="hidden" value="#divimageshow" id="divhide" name="divhide">
    <input type="hidden" name="id" value="{{$financial->id}}">
    @include('financials::partial.frm')
    {!! Form::close() !!}
@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
    {{HelperJS::clone_content('#name', '#replacename')}}
    {{HelperJS::mask_money('#price')}}
@endpush