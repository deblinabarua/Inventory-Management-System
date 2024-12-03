<?php    
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $post = $_POST['position'];
    $dbc=mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");
    if ($post == 'Owner'){
        $query3="SELECT * FROM User WHERE username='$username' AND password='$password'";
        $result3=mysqli_query($dbc,$query3) or die("Error querying database");
        if(mysqli_num_rows($result3)>0){
            $row=mysqli_fetch_assoc($result3);
            $_SESSION['user_id']=$row['user_id'];
            header("Location: owner_board.php");
            exit();
        }
        else{
            echo "Wrong username or password. Please try again <a href='login.html'>here</a>.";
        }
    }
    if ($post == 'Employee'){
        $query="SELECT * FROM Employee WHERE username='$username' AND password='$password'";
        $result=mysqli_query($dbc,$query) or die("Error querying database");
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            $_SESSION['shop_id']=$row['shop_id'];
            $_SESSION['emp_id']=$row['emp_id'];
            header("Location: emp_board.php");
        }
        else{
            echo "Wrong username or password. Please try again <a href='login.html'>here</a>.";
        }
    }

    mysqli_close($dbc);
?>