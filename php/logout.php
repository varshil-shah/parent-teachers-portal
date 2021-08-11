<?php
    session_start();
    session_destroy();
    header('location: http://localhost/ptp/sign-in.php');
?>
