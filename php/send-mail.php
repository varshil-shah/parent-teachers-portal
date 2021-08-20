<?php
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    include_once './config.php';
    include_once './common.php';
    $uniqueId = $_SESSION['uniqueId'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
    $emailList = mysqli_real_escape_string($con, $_POST['emailList']);
    $date = date("j M, Y");
    $teacherName = getTeacherName($con, $uniqueId);
    if(!empty($title) && !empty($message)) {
        if(!empty($emailList)) {
            $sql = "INSERT INTO email_send(uniqueId, title, message, users, date) 
                    VALUES('$uniqueId','$title','$message','$emailList','$date')";
            $sql_query = mysqli_query($con, $sql);
            if($sql_query && sendMail($emailList, $title, $message, $teacherName, $date)) {
                echo "Mail send successfully";
            }else {
                echo 'Failed to send email';
            }
        }else {
            echo "You must select atleast one user";
        }
    }else {
        echo "All input fields must be filled";
    }

    function sendMail($to, $title, $message, $teacherName, $date) {
        $headers = "From: K.J Somaiya Polytechnic<jerryshah1004@gmail.com>\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $newMessage = '
            <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Mail Template</title>
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
                </head>

                <body>
                    <div class="container"
                        style="background: #f2f2f2;border-radius: 10px; padding: 15px;font-family: \'Ubuntu Condensed\', sans-serif;width: 500px;">
                        <h4 style="width: 500px;">'.$message.'</h4>
                        <div class="teacherNameAndDate">
                            <h4 style="color: crimson; font-size: 17px;">'.$teacherName.'</h4>
                            <h4 style="color: crimson; font-size: 17px;">'.$date.'</h4>
                        </div>
                    </div>
                </body>
                </html>
        ';
        if(mail($to, $title, $newMessage, $headers)) {
            return true;
        }else{
            return false;
        }
    }
?>
