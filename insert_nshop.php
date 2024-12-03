<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();
    $user_id = $_SESSION['user_id'];

    $s_name = $_POST['s_name'];
    $s_add = $_POST['s_add'];
    $dbc=mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");
    
        while(true){
            $shop_id = bin2hex(random_bytes(10)); // generates a random alphanumeric string of 10 characters
            $query="SELECT * FROM Shop WHERE shop_id='$shop_id'";
            $result=mysqli_query($dbc,$query) or die("Error finding shop_id");
            if (mysqli_num_rows($result)==0){
                
                $query5="INSERT INTO Shop VALUES('$shop_id', $user_id, '$s_name', '$s_add')";
                $result5=mysqli_query($dbc,$query5) or die("Error entering shop");
                echo "Your shop has been created!<br>
                    Please remember your Shop ID: $shop_id<br>
                    Click <a href='owner_board.php'>here</a> to choose shop.";
                break;
            }
        }
    
    mysqli_close($dbc);
?>