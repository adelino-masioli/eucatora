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
    {{HelperJS::mask_money('#meters,  #price_total,  #price_unit, #price_shipp, #discount')}}
    <script>

        function updateTotal() {
            var qtd = $('#amount_item').val();
            var met = parseFloat($('#meters').val());
            var pri = parseFloat($('#price_unit').val());
            if(qtd > 0 && met > 0 && pri > 0) {
                var total = parseFloat(qtd * met * pri).toFixed(2);
                $('#price_total').val(Math.round(total));
            }
        }

    </script>
@endpush