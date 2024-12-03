<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();
    $dbc=mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");
    $shop_id = $_SESSION['shop_id'];
    $pro_name = $_POST['product'];

    $query="SELECT quantity, product_id FROM Product WHERE product_name = '$pro_name' AND shop_id = '$shop_id'";
    $result=mysqli_query($dbc,$query);
    while ($row = mysqli_fetch_assoc($result)){
        $quantity = $row['quantity'];
        $product_id = $row['product_id'];
        $_SESSION['product_id'] = $product_id;
    }
    if ($quantity == 0){
        ?>
        <p>No units for this product. Please go <a href = "purchase.php">back</a>.</p>
        <?php
    }
    else{
        ?>
        <form method = "POST" action = "pur_change.php">
        <p>Enter quantity to purchase (it shouldn't be more than <?php echo $quantity; ?>):</p>
        <input type="number" name = "quantity" min="1" max="<?php echo $quantity; ?>" oninput="(!validity.rangeOverflow||(value=<?php echo $quantity; ?>)) && (!validity.rangeUnderflow||(value=1)) &&(!validity.stepMismatch||(value=parseInt(this.value)));">
        <input type="submit" value="Submit">
        </form>
        <?php
    }
?>