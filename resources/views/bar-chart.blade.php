<!DOCTYPE html>
<html>
<head>
    <title>Bar Chart</title>
    <!-- Latest CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <div class="chart-container">
        <div class="bar-chart-container">
            <canvas id="bar-chart"></canvas>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        $(function(){
            // Mendapatkan data chart dari controller
            var cData = {!! json_encode(['labels' => $labels, 'dataset' => $dataset]) !!};
            var ctx = $("#bar-chart");

            // Data untuk chart
            var data = {
                labels: cData.labels,
                datasets: [{
                    label: "Companies Count",
                    data: cData.dataset,
                    backgroundColor: "#2196F3",
                    borderWidth: 1
                }]
            };

            // Options untuk chart
            var options = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Companies Count by Year",
                    fontSize: 18,
                    fontColor: "#111"
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            };

            // Membuat objek Chart
            var myChart = new Chart(ctx, {
                type: "bar",
                data: data,
                options: options
            });
        });
    </script>
</body>
</html>
