<!DOCTYPE html>
<html>
<head>
    <title>Chart</title>
    <!-- Latest CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <div class="chart-container">
        <div class="pie-chart-container">
            <canvas id="pie-chart"></canvas>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        $(function(){
            // Mendapatkan data chart dari controller
            var cData = {!! json_encode($data) !!};
            var ctx = $("#pie-chart");

            // Data untuk chart
            var data = {
                labels: cData.labels,
                datasets: [{
                    data: cData.data,
                    backgroundColor: getRandomColors(cData.data.length),
                    borderColor: "#ffffff",
                    borderWidth: 1
                }]
            };

            // Options untuk chart
            var options = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Companies Count by Source - Last 7 Days",
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
                type: "pie",
                data: data,
                options: options
            });

            // Fungsi untuk mendapatkan warna acak
            function getRandomColors(count) {
                var colors = [];
                for (var i = 0; i < count; i++) {
                    colors.push('#' + (Math.random().toString(16) + '000000').slice(2, 8).toUpperCase());
                }
                return colors;
            }
        });
    </script>
</body>
</html>
