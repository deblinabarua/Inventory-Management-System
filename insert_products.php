<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();
        // Check if session variables are set
    if (isset($_SESSION['shop_id']) && isset($_SESSION['user_id'])) {
        $shop_id = $_SESSION['shop_id'];
        $user_id = $_SESSION['user_id'];
    } else {
        // Handle the case where session variables are not set
        // Redirect to login or an error page, or set default values
        die("Session variables are not set. Please log in again.");
    }
    $p_name = $_POST['p_name'];
    $category = $_POST['category'];
    
    if ($category == 'NONE'){
        $category = $_POST['altcategory'];
    }

    $quantity = $_POST['quantity'];
    $ws_price = $_POST['ws_price'];
    $s_price = $_POST['s_price'];
    $doa = $_POST['DoA'];

    echo $p_name; 
    echo $category;
    echo $quantity;
    echo $ws_price;
    echo $s_price;
    echo $doa;

    $dbc=mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");
    $query = "INSERT INTO Product(shop_id, product_name, category, quantity, ws_price, selling_price, date_arrival) VALUES('$shop_id', '$p_name', '$category', '$quantity', '$ws_price', '$s_price', '$doa')";
    //check table name and input accordingly  
    $result = mysqli_query($dbc,$query) or die("Error inserting");
    echo "The product has been added successfully. Click <a href = 'products_off.php'>here</a> to go back.";
    mysqli_close($dbc);
?>