<?php 
    session_start();
    session_destroy();

    echo "<script>window.open('admin_login.php?admin_logout=You have logged out, come back soon','_self')</script>";
?>