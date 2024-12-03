<?php
    session_start();
    $shop_id = $_POST['shop_id'];
    $dbc = mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");
    $query = "SELECT * FROM Shop WHERE shop_id = '$shop_id'";
    $result = mysqli_query($dbc,$query) or die("Error querying the database");
    if (mysqli_num_rows($result) > 0){
        $_SESSION['shop']=$shop_id;
        header("Location: signup_emp.html");
        exit();
    }
    else{
        echo "Incorrect Shop ID, please try again <a href = 'shop_id.html'>here</a>.";
        echo "Not a member? Click <a href = 'signup_owner.html'>here</a>.";
    }
    mysqli_close($dbc);
?>