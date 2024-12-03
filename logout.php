<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();

    session_destroy();
    echo 'You have logged out!';
    echo '<br>';
    echo '<a href = "landing_page.html">Return to landing page</a>';
?>