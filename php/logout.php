<?php
    session_start();
    session_destroy();
    header('location: http://localhost/ptp/forms/sign-in.php');
?>