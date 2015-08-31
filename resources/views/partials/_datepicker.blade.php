@section('styles.header')
    <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">
@stop

@section('scripts.footer')
    <script src="/js/moment-with-locales.min.js"></script>
    <script src="/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(function () {
            $('#dobpicker').datetimepicker({format: 'DD/MM/YYYY'});
        });
    </script>
@stop