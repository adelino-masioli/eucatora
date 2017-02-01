@extends('administration::base')
@section('body')
    {!! Form::open(array('url' => 'dashboard/financial/store', 'id'=> 'frmFinancial', 'data-toggle'=>'validator', 'role'=>'form')) !!}
        @include('financials::partial.menufrm')
        <input type="hidden" value="reset" id="formreset" name="formreset">
        @include('financials::partial.frm')
    {!! Form::close() !!}

@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
    {{HelperJS::mask_money('#price')}}
@endpush