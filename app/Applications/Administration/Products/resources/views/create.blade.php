@extends('administration::base')
@section('body')
    {!! Form::open(array('url' => 'dashboard/product/store', 'id'=> 'frmProduct', 'data-toggle'=>'validator', 'role'=>'form')) !!}
        @include('products::partial.menufrm')
        <input type="hidden" value="reset" id="formreset" name="formreset">
        @include('products::partial.frm')
    {!! Form::close() !!}

@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
    {{HelperJS::tags_input('.tagsinput', '(SEO) Palavras chaves') }}
    {{HelperJS::slug('#seo_title', 'seo_url')}}
@endpush