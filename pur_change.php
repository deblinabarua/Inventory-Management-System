<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();
    $dbc=mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");
    $shop_id = $_SESSION['shop_id'];
    $product_id = $_SESSION['product_id'];
    $quantity = $_POST['quantity'];

    $query="UPDATE Product SET quantity = quantity - '$quantity' WHERE product_id = '$product_id'"; //add single quotes
    $result=mysqli_query($dbc,$query);
    $query2 = "INSERT INTO Purchase(product_id, purchase_date, quantity) VALUES ('$product_id', CURDATE(), '$quantity')"; //add single quotes
    $result2 = mysqli_query($dbc,$query2); // add this line
    mysqli_close($dbc);
    unset($_SESSION['product_id']);
?>
<p>Purchase complete. Click <a href = "purchase.php">here</a>.</p>