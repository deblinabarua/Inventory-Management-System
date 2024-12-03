<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();
?>
<html>
<head>
    <title>Add New Shop</title>
</head>
<body>
<form method="POST" action="insert_nshop.php">
    <table>
        <tr>
            <td>Enter Shop Name:</td>
            <td>Remember to keep it short and precise to help you remember!</td>
            <td><input type="text" name="s_name"></td>
        </tr>
        <tr>
            <td>Enter Shop Address:</td>
            <td><input type="text" name="s_add"></td>
        </tr>
    </table>
    <input type="submit" value="Submit">

</form>
</body>
</html>