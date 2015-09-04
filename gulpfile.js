var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    // Mix Styles
    mix.styles(['navbar-static-top.css','sweetalert.css', 'dropzone.css'],'public/css/master.min.css')
        .styles(['style.css'],'public/css/style.min.css')
        .styles(['signin.css'],'public/css/signin.min.css');

    // Mix Scripts
    mix.scripts(['jquery.min.js','bootstrap.min.js','sweetalert.min.js','ie10-viewport-bug-workaround.js'],'public/js/master.min.js')
        .scripts(['qr/qr.js','order.js','qr/camera.js','qr/init.js'],'public/js/mao-qrcode.min.js')
        .scripts(['dropzone.js'],'public/js/dropzone.min.js')
        .scripts(['html5shiv.min.js','respond.min.js'],'public/js/ieshim.min.js')
        .scripts(['numeral.min.js','jquery.validate.js'],'public/js/validation.min.js')
        .scripts([
           'qr/libs/grid.js',
           'qr/libs/version.js',
           'qr/libs/detector.js',
           'qr/libs/formatinf.js',
           'qr/libs/errorlevel.js',
           'qr/libs/bitmat.js',
           'qr/libs/datablock.js',
           'qr/libs/bmparser.js',
           'qr/libs/datamask.js',
           'qr/libs/rsdecoder.js',
           'qr/libs/gf256poly.js',
           'qr/libs/gf256.js',
           'qr/libs/decoder.js',
           'qr/libs/QRCode.js',
           'qr/libs/findpat.js',
           'qr/libs/alignpat.js',
           'qr/libs/databr.js'
           ],'public/js/qrcode-reader.min.js');

    // Copy Minified Styles/Scripts
    mix.copy('resources/assets/css/bootstrap-datetimepicker.min.css','public/css/bootstrap-datetimepicker.min.css')
        .copy('resources/assets/js/moment-with-locales.min.js','public/js/moment-with-locales.min.js')
        .copy('resources/assets/js/chart.min.js','public/js/chart.min.js')
        .copy('resources/assets/css/bootstrap.min.css','public/css/bootstrap.min.css')
        .copy('resources/assets/js/bootstrap-datetimepicker.min.js','public/js/bootstrap-datetimepicker.min.js');
});
