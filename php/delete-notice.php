<?php
    session_start();
    include_once './config.php';
    if(!empty($_POST['id'])) {
        $id = mysqli_real_escape_string($con, $_POST['id']);
        $delete = "DELETE FROM notice WHERE nid = '$id'";
        if(deleteFileFromFolder($con, $id)) {
            $delete_query = mysqli_query($con, $delete);
            if($delete_query) {
                echo "Notice has been deleted";
            }else {
                echo "Something went wrong :(";
            }
        }else{
            echo 'Failed to delete file from folder';
        }
    }else {
        session_destroy();
        header('location: ../sign-in.php');
    }

    function deleteFileFromFolder($con, $id) {
        $sql = "SELECT * FROM notice WHERE nid = '$id'";
        $sql_query = mysqli_query($con, $sql);
        if(mysqli_num_rows($sql_query) > 0) {
            $row = mysqli_fetch_assoc($sql_query);
            $fileName = $row['pdfFile'];
            $path = 'uploads/'.$fileName;
            if(chmod($path, 0644) && unlink($path)) {
                return true;
            }
            return false;
        }
        return false;
    }
?>
