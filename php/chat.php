<?php
    session_start();
    include_once './config.php';
    if(isset($_SESSION['uniqueId'])) {
        $outgoiing_id = $_SESSION['uniqueId'];
        $incoming_id = $_POST['incoming_id'];
        $message = mysqli_real_escape_string($con, $_POST['message']);
        $sql = "INSERT INTO chat(incoming_msg_id, outgoing_msg_id, message)
        VALUES('$incoming_id','$outgoiing_id','$message')";
        $sql_query = mysqli_query($con, $sql);
        if(!$sql_query) {
            echo 'Failed to send chat';
        }
    }else {
        header('location: ../sign-in.php');
    }
?>
