<?php
    session_start();
    include_once './config.php';
    if(isset($_GET['id']) && $con) {
        $id = mysqli_real_escape_string($con, $_GET['id']);
        $get_file = "SELECT pdfFile FROM notice WHERE nid = '$id'";
        $get_file_query = mysqli_query($con, $get_file);
        if(mysqli_num_rows($get_file_query) > 0) {
            $row = mysqli_fetch_assoc($get_file_query);
            $fileName = $row['pdfFile'];
            download($fileName);
        }else {
            session_destroy();
            header('location: ../forms/sign-in.php');
        }
    }else {
        session_destroy();
        header('location: ../forms/sign-in.php');
    }

    function download($name) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($name));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $name));
        readfile('uploads/' . $name);
        exit;
    }
?>
