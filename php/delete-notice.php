<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
    session_start();
    include_once './config.php';
    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($con, $_GET['id']);
        $delete = "DELETE FROM notice WHERE nid = '$id'";
        $delete_query = mysqli_query($con, $delete);
        if($delete_query) {
            ?>
                <script>
                    // alert('Notice has been deleted');
                    location.replace('../user/main.php?page=announcements');
                </script>
            <?php
        }else {
            ?>
                <script>
                    alert('Failed to delete notice');
                </script>
            <?php
        }
    }else {
        session_destroy();
        header('location: ../forms/sign-in.php');
    }
?>