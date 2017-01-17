@extends('administration::base')
@section('body')
    {!! Form::open(array('url' => 'dashboard/customer/store', 'id'=> 'frmCustomer', 'data-toggle'=>'validator', 'role'=>'form')) !!}
        @include('customers::partial.menufrm')
        <input type="hidden" value="reset" id="formreset" name="formreset">
        @include('customers::partial.frm')
    {!! Form::close() !!}

@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
    {{HelperJS::combo_cities()}}
    {{HelperJS::input_mask_phone_celullar('#phone', '#celullar', '#zipcode')}}
@endpush