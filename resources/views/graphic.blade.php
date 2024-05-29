@extends('master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
            <div style="background-color: white; padding: 20px; border-radius: 10px; margin: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                <h2 class="text-center">Gráficos</h2>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div id="chart_div_quantity"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="chart_div_price"></div>
                    </div>
                <div class="row">
            </div>
    </div>       
</div>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        drawQuantityChart();
        drawPriceChart();
    }

    function drawQuantityChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Produto');
        data.addColumn('number', 'Quantidade');

        @foreach($products as $product)
        data.addRow(['{{ $product->name }}', {{ $product->quantity }}]);
        @endforeach

        var options = {
            'title':'Quantidade de Produtos',
            'width':500,
            'height':300,
            'pieHole': 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div_quantity'));
        chart.draw(data, options);
    }

    function drawPriceChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Produto');
        data.addColumn('number', 'Preço');

        @foreach($products as $product)
        data.addRow(['{{ $product->name }}', {{ $product->price }}]);
        @endforeach

        var options = {
            'title':'Preço dos Produtos',
            'width':500,
            'height':300,
            'bar': {groupWidth: "95%"},
            'legend': { position: "none" }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_price'));
        chart.draw(data, options);
    }
</script>

@endsection