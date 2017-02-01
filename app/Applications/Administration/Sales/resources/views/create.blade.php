@extends('administration::base')
@section('body')
    {!! Form::open(array('url' => 'dashboard/sale/store', 'id'=> 'frmSale', 'data-toggle'=>'validator', 'role'=>'form')) !!}
        @include('sales::partial.menufrm')
        <input type="hidden" value="reset" id="formreset" name="formreset">
        @include('sales::partial.frm')
    {!! Form::close() !!}
@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
@endpush