<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtered Most Purchased Products - Bar Graph</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            background-color: #f7f8fa; 
        }

        .filters {
            margin: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .chart-container {
            width: 80%;
            max-width: 1000px;
            margin: 20px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="filters">
    <label for="category">Category:</label>
    <select id="category">
    <?php
                
        $dbc=mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");
        $query="SELECT DISTINCT category FROM Product";
        $result=mysqli_query($dbc,$query);
        while ($row = mysqli_fetch_assoc($result)){
            $cat_name=$row['category'];
    ?>
            <option value = "<?php echo $cat_name; ?>"><?php echo $cat_name; ?></option>
    <?php
        }
    ?>
            <option value = 'all'>All</option>
    </select>

    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date">

    <label for="end_date">End Date:</label>
    <input type="date" id="end_date">

    <button onclick="displayGraph()">Display Graph</button>
</div>

<div class="chart-container">
    <canvas id="barChart"></canvas>
</div>

<script>
    let chart; // Global variable to store the chart instance

    function updateBarGraph() {
        const category = document.getElementById("category").value;
        const startDate = document.getElementById("start_date").value;
        const endDate = document.getElementById("end_date").value;

        // Fetch data from server-side using the provided filters
        fetch(`graph_display.php?category=${category}&start_date=${startDate}&end_date=${endDate}`)
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    alert("No data available for the selected filters.");
                    return;
                }

                // Prepare data for the chart
                const labels = data.map(item => item.product_name);
                const quantities = data.map(item => item.total_quantity);

                // If a chart instance already exists, destroy it before creating a new one
                if (chart) {
                    chart.destroy();
                }

                // Create a new chart instance
                const ctx = document.getElementById('barChart').getContext('2d');
                chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Most Purchased Products',
                            data: quantities,
                            backgroundColor: 'rgba(42, 157, 143, 0.6)', // Bar color
                            borderColor: 'rgba(42, 157, 143, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Quantity'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Product Name'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false // Hide the legend if unnecessary
                            }
                        }
                    }
                });
            })
            .catch(error => console.log("Error fetching data:", error));
    }

    function displayGraph() {
        updateBarGraph();
    }
</script>

</body>
</html>




