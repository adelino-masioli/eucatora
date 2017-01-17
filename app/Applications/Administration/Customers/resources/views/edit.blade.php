@extends('administration::base')
@section('body')
    {!! Form::model($customer, array('url' => 'dashboard/customer/update/', 'id'=> 'frmCustomer', 'method'=> 'put', 'data-toggle'=>'validator', 'role'=>'form')) !!}
    @include('customers::partial.menufrm')
    <input type="hidden" value="" id="formreset" name="formreset">
    <input type="hidden" name="id" value="{{$customer->id}}">
    <input type="hidden" name="user_id" value="{{$customer->user_id}}">
    <input type="hidden" name="transaction" value="{{$customer->transaction}}">
    @include('customers::partial.frm')
    {!! Form::close() !!}
@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
    {{HelperJS::clone_content('#name', '#replacename')}}
    {{HelperJS::combo_cities()}}
    {{HelperJS::input_mask_phone_celullar('#phone', '#celullar', '#zipcode')}}
@endpush