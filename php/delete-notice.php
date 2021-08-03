<?php
    session_start();
    include_once './config.php';
    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($con, $_GET['id']);
        $delete = "DELETE FROM notice WHERE nid = '$id'";
        $delete_query = mysqli_query($con, $delete);
        if($delete_query) {
            echo "Notice deleted successfully";
        }else {
            echo "Failed to delete notice";
        }
    }else {
        session_destroy();
        header('location: ../forms/sign-in.php');
    }
?>