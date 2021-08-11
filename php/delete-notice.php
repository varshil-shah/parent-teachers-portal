<?php
    session_start();
    include_once './config.php';
    if(!empty($_POST['id'])) {
        $id = mysqli_real_escape_string($con, $_POST['id']);
        $delete = "DELETE FROM notice WHERE nid = '$id'";
        $delete_query = mysqli_query($con, $delete);
        if($delete_query) {
            echo "Notice has been deleted";
        }else {
            echo "Something went wrong :(";
        }
    }else {
        session_destroy();
        header('location: ../sign-in.php');
    }
?>