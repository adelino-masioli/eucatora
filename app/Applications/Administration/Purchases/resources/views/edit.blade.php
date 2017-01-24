@extends('administration::base')
@section('body')
    {!! Form::model($purchase, array('url' => 'dashboard/purchase/update/', 'id'=> 'frmPurchase', 'method'=> 'put', 'data-toggle'=>'validator', 'role'=>'form')) !!}
    @include('purchases::partial.menufrm')
    <input type="hidden" value="" id="formreset" name="formreset">
    <input type="hidden" name="purchase_id" id="purchase_id" value="{{$purchase->id}}">
    <input type="hidden" name="transaction" value="{{$purchase->transaction}}">
    @include('purchases::partial.frm')
    {!! Form::close() !!}

    <input type="hidden" id="pathdestroy" name="pathdestroy" value="{{url('dashboard/purchase/destroy-item/')}}">
    <input type="hidden" id="pathdestroytaxe" name="pathdestroytaxe" value="{{url('dashboard/purchase/destroy-tax/')}}">
@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
    {{HelperJS::combo_products(url('dashboard/product/filter-by-id'), 'product_id')}}
    {{HelperJS::mask_money('#area, #meters_square, #meters_stereo, #price, #price_tax')}}


    <script>

    </script>
@endpush