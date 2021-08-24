<?php
    session_start();
    include_once './config.php';
    $email = mysqli_real_escape_string($con, $_POST['email']);
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM signup WHERE email = '$email'";
        $sql_query = mysqli_query($con, $sql);
        if(mysqli_num_rows($sql_query) > 0) {
            $row = mysqli_fetch_assoc($sql_query);
            $fullName = $row['fullName'];
            $rand = rand(111111,999999);
            $update = "UPDATE signup SET otp = '$rand' WHERE email = '$email'";
            $update_query = mysqli_query($con, $update);
            $message = "Hello Mr/Mrs $fullName\nYour OTP to change password is $rand";
            $from = "From: K.J Somaiya Polytechnic<noreply.kjsp@gmail.com>";
            if($update_query && sendMail($email, $fullName, $rand)) {
                $_SESSION['forgotEmail'] = $email;
                echo "success";
            }else {
                echo 'Something went wrong';
            }
        }else {
            echo "Email doesn't exists";
        }
    }else{
        echo "Email field must be filled";
    }

    function sendMail($to, $fullName, $otp) {
        $headers = "From: " . strip_tags("K.J Somaiya Polytechnic <noreply.kjsp@gmail.com>") . "\r\n";
        $headers .= "Reply-To: ". strip_tags("K.J Somaiya Polytechnic <noreply.kjsp@gmail.com>") . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $subject = "Forgot Password";
        $message = '
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>One Time Password</title>
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
            </head>

            <body>
                <div class="container"
                    style="background: #f2f2f2;border-radius: 10px; padding: 30px;font-family: \'Ubuntu Condensed\', sans-serif; width: 500px;">
                    <h2 style="font-size: 20px;">Hello Mr/Mrs '.$fullName.'</h2>
                    <p style="font-size: 18px;">Your OTP to change password is </p>
                    <h3
                        style="font-size: 26px; background-color: crimson; text-align: center; color: #fff; padding: 10px 12px; border-radius: 5px; letter-spacing: 2px;">
                        '.$otp.'</h3>
                </div>
            </body>
            </html>
        ';
        if(mail($to, $subject, $message, $headers)) {
            return true;
        }else{
            return false;
        }
    }
?>
