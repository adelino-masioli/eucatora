@extends('administration::base')
@section('body')
    {!! Form::model($product, array('url' => 'dashboard/product/update/', 'id'=> 'frmProduct', 'method'=> 'put', 'data-toggle'=>'validator', 'role'=>'form')) !!}
    @include('products::partial.menufrm')
    <input type="hidden" value="#divimagehide" id="divshow" name="divshow">
    <input type="hidden" value="#divimageshow" id="divhide" name="divhide">
    <input type="hidden" name="id" value="{{$product->id}}">
    @include('products::partial.frm')
    {!! Form::close() !!}
@stop
@push('scripts')
    {{HelperJS::select_drowdown('select', 'btn-default', 8)}}
    {{HelperJS::tags_input('.tagsinput', '(SEO) Palavras chaves') }}
    {{HelperJS::slug('#seo_title', 'seo_url')}}
    {{HelperJS::clone_content('#name', '#replacename')}}
@endpush