<?php
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    include_once './config.php';
    $teacherName = getTeacherName($_SESSION['email'], $con);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
    $emailList = mysqli_real_escape_string($con, $_POST['emailList']);
    $date = date("j M, Y");
    if(!empty($title) && !empty($message)) {
        if(!empty($emailList)) {
            $sql = "INSERT INTO email_send(title, message, users, teacher, date) 
                    VALUES('$title','$message','$emailList','$teacherName','$date')";
            $sql_query = mysqli_query($con, $sql);
            $message .= "\r\nTeacher: ".$teacherName."\r\nDate: ".$date;
            $from = "From: K.J Somaiya Polytechnic<jerryshah1004@gmail.com>\nBcc: $emailList";
            if($sql_query && mail($emailList, $title, nl2br($message), $from)) {
                echo "Mail send successfully";
            }else {
                echo $from.'\n';
                echo 'Failed to send email';
            }
        }else {
            echo "You must select atleast one user";
        }
    }else {
        echo "All input fields must be filled";
    }

    function getTeacherName($teacherEmail, $con) {
        $sql = "SELECT fullName FROM signup WHERE email = '$teacherEmail'";
        $sql_query = mysqli_query($con, $sql);
        if(mysqli_num_rows($sql_query) > 0) {
            $row = mysqli_fetch_assoc($sql_query);
            return $row['fullName'];
        }
        return null;
    }
?>
