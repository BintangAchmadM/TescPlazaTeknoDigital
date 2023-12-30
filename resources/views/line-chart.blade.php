<!DOCTYPE html>
<html>
<head>
    <title>Line Chart</title>
    <!-- Latest CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <div class="chart-container">
        <div class="line-chart-container">
            <canvas id="line-chart"></canvas>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        $(function(){
            // Mendapatkan data chart dari controller
            var cData = {!! json_encode(['labels' => $labels, 'dataset' => $dataset]) !!};
            var ctx = $("#line-chart");

            // Data untuk chart
            var data = {
                labels: cData.labels,
                datasets: [{
                    label: "Companies Count",
                    data: cData.dataset,
                    fill: false,
                    borderColor: "#2196F3",
                    borderWidth: 2,
                    lineTension: 0.1
                }]
            };

            // Options untuk chart
            var options = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Companies Count Over Time",
                    fontSize: 18,
                    fontColor: "#111"
                },
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        fontColor: "#333",
                        fontSize: 16
                    }
                }
            };

            // Membuat objek Chart
            var myChart = new Chart(ctx, {
                type: "line",
                data: data,
                options: options
            });
        });
    </script>
</body>
</html>
