@extends('administration::base')
@section('body')
    {!! Form::open(array('url' => 'dashboard/provider/store', 'id'=> 'frmProvider', 'data-toggle'=>'validator', 'role'=>'form')) !!}
        @include('providers::partial.menufrm')
        <input type="hidden" value="reset" id="formreset" name="formreset">
        @include('providers::partial.frm')
    {!! Form::close() !!}

@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
    {{HelperJS::combo_cities()}}
    {{HelperJS::input_mask_phone_celullar('#phone', '#celullar', '#zipcode')}}
@endpush