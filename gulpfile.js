var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.styles([
        'bootstrap.min.css',
    ], 'public/bootstrap/css/bootstrap.min.css');
});
elixir(function(mix) {
    mix.styles([
        'font-awesome.min.css',
        'dataTables.bootstrap.min.css',
        'bootstrap-select.min.css',
        'bootstrap-tagsinput.css',
        'animate.css',
        'bootstrap-datepicker3.min.css',
        'awesome-bootstrap-checkbox.css',
        'sweetalert.css',
    ], 'public/css/plugins.css');
});
elixir(function(mix) {
    mix.styles([
        'roboto.css',
    ], 'public/css/roboto.css');
});
elixir(function(mix) {
    mix.scripts([
        'jquery-3.1.1.min.js',
        'bootstrap.min.js',
    ], 'public/bootstrap/js/jquery_bootstrap.min.js');
});


//css and js administration
elixir(function(mix) {
    mix.less([
        'app.less',
    ], 'public/css/app.css');
});

elixir(function(mix) {
    mix.scripts([
        'jquery.dataTables.min.js',
        'dataTables.bootstrap.min.js',
        'bootstrap-filestyle.min.js',
        'bootstrap-select.min.js',
        'bootstrap-tagsinput.js',
        'jquery.form.min.js',
        'bootstrap-notify.min.js',
        'validator.min.js',
        'typeahead.js',
        'bootstrap-datepicker.min.js',
        'bootbox.js',
        'jquery.friendurl.min.js',
        'jquery.maskMoney.min.js',
        'maskedinput.min.js',
        'velocity.min.js',
        'velocity.ui.min.js',
    ], 'public/js/plugins.js');
});
elixir(function(mix) {
    mix.scripts([
        'app.js',
    ], 'public/js/app.js');
});
elixir(function(mix) {
    mix.scripts([
        'sweetalert.min.js',
        'site.js',
    ], 'public/js/site.js');
});


elixir(function(mix) {
    mix.less([
        'site.less',
    ], 'public/themes/imprinex/css/site.css');
});

elixir(function(mix) {
    mix.version(['public/bootstrap/css/bootstrap.min.css', 'public/css/plugins.css', 'public/css/app.css', 'public/css/roboto.css',
        'public/bootstrap/js/jquery_bootstrap.min.js', 'public/js/plugins.js', 'public/js/app.js', 'public/js/site.js'
    ]);
});
elixir(function(mix) {
    mix.copy('resources/assets/fonts', 'public/build/fonts');
    mix.copy('resources/assets/images', 'public/build/images');
});