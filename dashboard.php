<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();
    $shop_id=$_POST["shop"];
    $_SESSION['shop_id'] = $shop_id;
    echo "Hello, $shop_id";
    echo '<br>';
    echo $_SESSION['user_id'];
?> 
<html lang="en">
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                Menu
            </button>
        </p>
        <div style="min-height: 120px;">
            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                <div class="card card-body" style="width: 300px;">
                    <ul>
                        <li><button onclick="location.href='settings.html'">Settings</button></li>
                        <li><button onclick="location.href='employee.php'">Employees</button></li>
                        <li><button onclick="location.href='purchase.php'">Purchase</button></li>
                        <li><button onclick="location.href='products_off.php'">Products</button></li>
                        <li><button onclick = "location.href = 'add_shops.php'">Add Shops</button></li>
                        <li><button onclick = "location.href = 'graph.php'">Check Sales</button></li>
                    </ul>
                </div>
            </div>
        </div>
        <button onclick="location.href='logout.php'">Logout</button>
    </body>
</html>