@extends('administration::base')
@section('body')
    {!! Form::model($provider, array('url' => 'dashboard/provider/update/', 'id'=> 'frmProvider', 'method'=> 'put', 'data-toggle'=>'validator', 'role'=>'form')) !!}
    @include('providers::partial.menufrm')
    <input type="hidden" value="" id="formreset" name="formreset">
    <input type="hidden" name="id" value="{{$provider->id}}">
    <input type="hidden" name="user_id" value="{{$provider->user_id}}">
    <input type="hidden" name="transaction" value="{{$provider->transaction}}">
    @include('providers::partial.frm')
    {!! Form::close() !!}
@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
    {{HelperJS::clone_content('#name', '#replacename')}}
    {{HelperJS::combo_cities()}}
    {{HelperJS::input_mask_phone_celullar('#phone', '#celullar', '#zipcode')}}
@endpush