@extends('administration::base')
@section('body')
    {!! Form::open(array('url' => 'dashboard/purchase/store', 'id'=> 'frmPurchase', 'data-toggle'=>'validator', 'role'=>'form')) !!}
        @include('Sales::partial.menufrm')
        <input type="hidden" value="reset" id="formreset" name="formreset">
        @include('Sales::partial.frm')
    {!! Form::close() !!}
@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
@endpush