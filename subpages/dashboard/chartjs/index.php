<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chartjs</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <canvas id="myChart"></canvas>
    <script>
        const ctx = document.getElementById('myChart');

        const myChart = new Chart(ctx, {
            type: 'bar',

            data: {
                labels: ['Jan', 'Feb', 'Mac', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Jualan',
                    data: [12, 19, 8, 15, 22, 17],
                    backgroundColor: 'blue'
                }]
            },

            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <!-- <h1>Hello</h1> -->
</body>

</html>