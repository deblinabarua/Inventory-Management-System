
<html>
    <head>
        <title>Choose Shop</title>
    </head>
    <body>
        <form method="POST" action="dashboard.php">
            <?php
                ini_set("session.cache_limiter", "must-revalidate");
                session_start();
                $user_id=$_SESSION['user_id'];
                echo "Welcome $user_id";
                $dbc=mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");
                $query="SELECT * FROM Shop WHERE user_id = $user_id";
                $result=mysqli_query($dbc,$query);
                while ($row = mysqli_fetch_assoc($result)){
                    $shop_id=$row['shop_id'];                                             //changes from here onwards
                    $shop_name = $row['shop_name'];
            ?>
                    <button name='shop' type='submit' value="<?php echo $shop_id;?>">
                        <?php echo $shop_name;?>
                    </button><br>
            <?php
                }
            ?>
        </form>
    </body>
</html>
<?php
    mysqli_close($dbc);
?>