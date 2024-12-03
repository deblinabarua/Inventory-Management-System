<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();
    $dbc=mysqli_connect('localhost','root','MySenseofTime...0','IMS') or die("Error connecting to the database");
    $del_employee = $_POST['del_row'];
    foreach ($del_employee as $row){
        $query = "DELETE FROM Employee WHERE emp_id = $row";
        $result = mysqli_query($dbc, $query) or die("Error deleting");
    }
    echo "Deletion complete. Click <a href = 'employee.php'>here</a> to return.";
    mysqli_close($dbc);
?>