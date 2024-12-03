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
    $dbc=mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");
?>
<html>
    <head>
        <title>Products</title>
    </head>
    <body>
        <form method = "POST" action = "delete_products.php">
        <table>
            <tr>
                <td>Product Name</td>
                <td>Category</td>
                <td>Quantity</td>
                <td>Wholesale Price</td>
                <td>Selling Price</td>
                <td>Date of Arrival</td>
                <td>Check to Delete</td>
            </tr>
        <?php
            
            
            $query="SELECT * FROM Product WHERE shop_id = '$shop_id'";
            $result=mysqli_query($dbc,$query);
            while ($row = mysqli_fetch_assoc($result)){

        ?>
            <tr>
                <td><?php echo $row['product_name'] ?>  </td>
                <td><?php echo $row['category'] ?></td>  
                <td><?php echo $row['quantity'] ?></td>
                <td><?php echo $row['ws_price'] ?></td>
                <td><?php echo $row['selling_price'] ?></td>  <!-- removed the extra dollar sign here -->
                <td><?php echo $row['date_arrival'] ?></td>
                <td><input type = "checkbox" name = "del_row[]" value = "<?php echo $row['product_id']; ?>"></td> <!-- square brackets here -->
            </tr>
        <?php
            }
        ?>
        </table>
        Click here to delete checked rows: <input type="submit" value="Submit">
        <br>
        </form>
        <button onclick="location.href='add_products.php'">Add Product</button>
    </body>
</html>