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
?>

<html>
    <head>
        <title>Add Products</title>
    </head>
    <body>
        <form method = "POST" action = "insert_products.php">
        Product Name: <input type="text" name="p_name">
        <br>
        Category: 
            <select name = "category">
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
                        <option value = "NONE" selected>Not Here</option>
            </select>
            <p>If the dropdown does not contain the category you wish, please enter category name below and choose the option "Not Here"</p>
            <input type = "text" name = "altcategory">
        <br>
            
        Quantity: <input type="number" name="quantity">
        <br>
        Wholesale Price: <input type="number" name="ws_price">
        <br>
        Selling Price: <input type="number" name="s_price" step="0.01">
        <br>
        Date of Arrival: <input type="date" name="DoA">
        <br>
        <input type="submit" value="Submit">
        </form>
    </body>
</html>