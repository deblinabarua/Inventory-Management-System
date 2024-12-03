<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();

?>
<html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>
        <p>Building Pages Still!</p>
        <?php session_destroy(); ?>
    </body>
</html>