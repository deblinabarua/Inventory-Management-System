<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();
    $dbc=mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");
    $del_products = $_POST['del_row'];
    foreach ($del_products as $row){
        echo $row;
        $query = "DELETE FROM Product WHERE product_id = $row";
        $result = mysqli_query($dbc, $query) or die("Error deleting");
    }
    echo "Deletion complete. Click <a href = 'products_off.php'>here</a> to return.";
    mysqli_close($dbc);
?>