<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 Data Visualization</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Load Chart.js -->
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        canvas { max-width: 90vw; height: 500px; margin: auto; }
    </style>
</head>
<body>
    <br></br>
    <h2>COVID-19 Cases Over Time</h2>
    <canvas id="covidChart"></canvas>

    <?php
    // Load JSON data
    $jsonData = file_get_contents('covid.json');
    $data = json_decode($jsonData, true);

    // Prepare arrays for visualization
    $dates = [];
    $confirmed = [];
    $deaths = [];
    $recoveries = [];
    $activeCases = [];
    $dailyConfirmed = [];
    $dailyDeaths = [];

    foreach ($data as $entry) {
        $dates[] = $entry["Date"];
        $confirmed[] = (int) preg_replace('/\D/', '', $entry["Total Confirmed Cases"]);
        $deaths[] = (int) preg_replace('/\D/', '', $entry["Total Deaths"]);
        $recoveries[] = (int) preg_replace('/\D/', '', $entry["Total Recovered"]);
        $activeCases[] = (int) preg_replace('/\D/', '', $entry["Active Cases"]);
        $dailyConfirmed[] = (int) preg_replace('/\D/', '', $entry["Daily Confirmed Cases"]);
        $dailyDeaths[] = (int) preg_replace('/\D/', '', $entry["Daily  deaths"]);
    }
    ?>

    <script>
        // Convert PHP data into JavaScript arrays
        const dates = <?php echo json_encode($dates); ?>;
        const confirmed = <?php echo json_encode($confirmed); ?>;
        const deaths = <?php echo json_encode($deaths); ?>;
        const recoveries = <?php echo json_encode($recoveries); ?>;
        const activeCases = <?php echo json_encode($activeCases); ?>;
        const dailyConfirmed = <?php echo json_encode($dailyConfirmed); ?>;
        const dailyDeaths = <?php echo json_encode($dailyDeaths); ?>;

        // Create COVID-19 Chart
        const ctx = document.getElementById('covidChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [
                    {
                        label: 'Total Confirmed Cases',
                        data: confirmed,
                        borderColor: 'blue',
                        borderWidth: 2,
                        pointRadius: 2,
                        tension: 0.3,
                        fill: false
                    },
                    {
                        label: 'Total Deaths',
                        data: deaths,
                        borderColor: 'red',
                        borderWidth: 2,
                        pointRadius: 2,
                        tension: 0.3,
                        fill: false
                    },
                    {
                        label: 'Total Recovered',
                        data: recoveries,
                        borderColor: 'green',
                        borderWidth: 2,
                        pointRadius: 2,
                        tension: 0.3,
                        fill: false
                    },
                    {
                        label: 'Active Cases',
                        data: activeCases,
                        borderColor: 'orange',
                        borderWidth: 2,
                        pointRadius: 2,
                        tension: 0.3,
                        fill: false
                    },
                    {
                        label: 'Daily Confirmed Cases',
                        data: dailyConfirmed,
                        borderColor: 'purple',
                        borderWidth: 1.5,
                        pointRadius: 2,
                        borderDash: [5, 5], // Dashed line for daily cases
                        tension: 0.3,
                        fill: false
                    },
                    {
                        label: 'Daily Deaths',
                        data: dailyDeaths,
                        borderColor: 'black',
                        borderWidth: 1.5,
                        pointRadius: 2,
                        borderDash: [5, 5], // Dashed line for daily deaths
                        tension: 0.3,
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: { display: true, text: 'Date' },
                        ticks: { autoSkip: true, maxTicksLimit: 10 }
                    },
                    y: {
                        title: { display: true, text: 'Number of Cases' }
                    }
                },
                plugins: { legend: { position: 'top' } }
            }
        });

    </script>
</body>
</html>
