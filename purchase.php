<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();
    $dbc=mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");
    $shop_id = $_SESSION['shop_id'];
?>
<html>
    <head>
        <title>Purchase</title>
    </head>
    <body>
        
        <form method = "POST" action = "insert_purchase.php">
            Select Product: 
            <select name = "product">
                <?php
                    $query="SELECT product_name FROM Product WHERE shop_id = '$shop_id'";
                    $result=mysqli_query($dbc,$query);
                    while ($row = mysqli_fetch_assoc($result)){
                        $pro_name=$row['product_name'];
                ?>
                        <option value = "<?php echo $pro_name; ?>"><?php echo $pro_name; ?></option>
                <?php
                    }
                ?>
            </select>
            <input type="submit" value="Submit">
        </form>
        <?php
            mysqli_close($dbc);
        ?>
    </body>
</html>