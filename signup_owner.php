<?php
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phone = $_POST['telephone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $s_name = $_POST['s_name'];
    $s_add = $_POST['s_add'];
    $dbc=mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");
    $query3="SELECT * FROM User WHERE username='$username'";
    $result3=mysqli_query($dbc,$query3) or die("Error finding username");     
    if(mysqli_num_rows($result3)>0){
        echo "Username already exits. Please try again <a href='signup_owner.html'>here</a>.";
    }
    else{
        while(true){
            $shop_id = bin2hex(random_bytes(10)); // generates a random alphanumeric string of 10 characters
            $query="SELECT * FROM Shop WHERE shop_id='$shop_id'";
            $result=mysqli_query($dbc,$query) or die("Error finding shop_id");
            if (mysqli_num_rows($result)==0){
                $query2="INSERT INTO User(username, first_name, last_name, password, phone_no, email) VALUES('$username','$f_name','$l_name','$password','$phone','$email')";
                $result2=mysqli_query($dbc,$query2) or die("Error inserting user");
                $query4="SELECT * FROM User WHERE username='$username'";
                $result4=mysqli_query($dbc,$query4) or die("Error getting user_id");
                $row=mysqli_fetch_assoc($result4);
                $user_id=$row['user_id'];
                $query5="INSERT INTO Shop VALUES('$shop_id', $user_id, '$s_name', '$s_add')";
                $result5=mysqli_query($dbc,$query5) or die("Error entering shop");
                echo "Your shop has been created!<br>
                    Please remember your Shop ID: $shop_id<br>
                    Click <a href='login.html'>here</a> to get started.";
                break;
            }
        }
    }
    mysqli_close($dbc);
?>