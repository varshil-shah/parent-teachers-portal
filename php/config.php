<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "ptp";

    $con = mysqli_connect($server, $user, $pass, $db);

    if(!$con) {
        ?>
            <script>
                alert('Database connection failed');
                location.replace('../index.php');
            </script>
        <?php
    }
?>
