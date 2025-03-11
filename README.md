# COVID-19-Data-Visualization (PHP)

COVID-19 Data Visualization Using PHP & Chart.js
This project reads COVID-19 data from a covid.json file, processes it using PHP, and visualizes it using Chart.js in a web browser. 
The visualization includes total confirmed cases, deaths, recoveries, active cases, and daily statistics.

# The code is structured as follows:

1. Chart.js Setup

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
This imports Chart.js, a JavaScript library for rendering interactive charts.
No additional setup is required.
Defines datasets (confirmed cases, deaths, recoveries, active cases, daily confirmed, daily deaths).
Uses dashed lines for daily statistics (borderDash: [5, 5]).
Limits x-axis labels to 10 using maxTicksLimit: 10.


<canvas id="covidChart"></canvas>
This element is where the chart will be drawn.

body { font-family: Arial, sans-serif; text-align: center; }
canvas { max-width: 90vw; height: 500px; margin: auto; }
This CSS ensures the chart is responsive and fits well on the page.


2. PHP: Reading & Processing Data


$jsonData = file_get_contents('covid.json');
$data = json_decode($jsonData, true);

file_get_contents('covid.json') loads the JSON file.
json_decode(..., true) converts it into an associative array.


3. Passing Data to JavaScript


<script>
    const dates = <?php echo json_encode($dates); ?>;
    const confirmed = <?php echo json_encode($confirmed); ?>;
    const deaths = <?php echo json_encode($deaths); ?>;
    const recoveries = <?php echo json_encode($recoveries); ?>;
    const activeCases = <?php echo json_encode($activeCases); ?>;
    const dailyConfirmed = <?php echo json_encode($dailyConfirmed); ?>;
    const dailyDeaths = <?php echo json_encode($dailyDeaths); ?>;
</script>

Uses json_encode() to pass PHP arrays to JavaScript.



# COVID-19-Data-Visualization (PowerBI)

The report in powerBI is also another way to visualise the data 


# Git.

The project is also setup in my git profile. you can clone it from

Git Clone https://github.com/LiswogaMR/COVID-19-Data-Visualization.git

