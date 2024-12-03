<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phone = $_POST['telephone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $post = $_POST['position'];
    $shop =$_SESSION['shop'];
    $dbc = mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");

    $query="SELECT * FROM Employee WHERE username='$username'";
    $result = mysqli_query($dbc, $query) or die("Error finding username");
    
    if (mysqli_num_rows($result) > 0){
        echo "Username already exits. Please try again <a href='signup_emp.html'>here</a>.";
    }
    else{
        $query2 = "INSERT INTO Employee(shop_id, username, first_name, last_name, password, phone_no, email, post) VALUES('$shop', '$username', '$f_name', '$l_name', '$password', '$phone', '$email', '$post')";
        $result2=mysqli_query($dbc,$query2) or die("Error inserting");
        session_unset();
        session_destroy();
        header("Location: login.html");
        exit();
    }
    mysqli_close($dbc);
?>