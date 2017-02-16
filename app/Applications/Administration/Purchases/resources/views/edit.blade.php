@extends('administration::base')
@section('body')
    {!! Form::model($purchase, array('url' => 'dashboard/purchase/update/', 'id'=> 'frmPurchase', 'method'=> 'put', 'data-toggle'=>'validator', 'role'=>'form')) !!}
    @include('purchases::partial.menufrm')
    <input type="hidden" value="" id="formreset" name="formreset">
    <input type="hidden" name="purchase_id" id="purchase_id" value="{{$purchase->id}}">
    <input type="hidden" name="transaction" value="{{$purchase->transaction}}">
    @include('purchases::partial.frm')
    {!! Form::close() !!}
@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
@endpush