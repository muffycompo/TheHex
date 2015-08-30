@section('scripts.footer')
    <script src="/js/chart.min.js"></script>
    <script>
        var ctx = $("#sales_chart").get(0).getContext("2d");
        var dashboardChart = new Chart(ctx);
        Chart.defaults.global.responsive = true;

        var options = {
            pointDot : true,
            bezierCurve : false,
            scaleShowGridLines : false,
        };

        var data = {
            labels: {!! json_encode($order_date) !!},
            datasets: [
                {
                    label: "Daily Sales Chart",
                    fillColor: "rgba(220,220,220,0.4)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: {!! json_encode($daily_sales) !!}
                }
            ]
        };
        dashboardChart.Line(data, options);
    </script>
@stop