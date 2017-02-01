@extends('administration::base')
@section('body')
    {!! Form::model($sale, array('url' => 'dashboard/sale/update/', 'id'=> 'frmSale', 'method'=> 'put', 'data-toggle'=>'validator', 'role'=>'form')) !!}
    @include('sales::partial.menufrm')
    <input type="hidden" value="" id="formreset" name="formreset">
    <input type="hidden" name="sale_id" id="sale_id" value="{{$sale->id}}">
    <input type="hidden" name="transaction" value="{{$sale->transaction}}">
    @include('sales::partial.frm')
    {!! Form::close() !!}

    <input type="hidden" id="pathdestroy" name="pathdestroy" value="{{url('dashboard/sale/destroy-item/')}}">
@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
    {{HelperJS::combo_products(url('dashboard/product/filter-by-id'), 'product_id')}}
    {{HelperJS::mask_money('#meters_square, #meters_stereo, #price, #price_tax')}}
    <script>

    </script>
@endpush