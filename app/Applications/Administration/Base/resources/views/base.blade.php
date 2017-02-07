<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>{{AppHelper::site_title()}}</title>
    <link href="{{url('build/images/favicon_color.png')}}" rel="shortcut icon" type="image/vnd.microsoft.icon" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="{{ elixir('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/roboto.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

</head>
<body><input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
<input type="hidden" name="baseurl" id="baseurl" value="<?php echo url(''); ?>">
    @include('administration::navbar')
    <div class="container-fluid">
        @yield('body')
    </div>

    <script src="{{ elixir('bootstrap/js/jquery_bootstrap.min.js') }}"></script>
    <script src="{{ elixir('js/plugins.js') }}"></script>
    <script src="{{ elixir('js/app.js') }}"></script>
    <script src="{{ elixir('js/purchasesale.js') }}"></script>
    @stack('scripts')
</body>
</html>
