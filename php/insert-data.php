<?php
    session_start();
    include_once './config.php';
    $fullName = mysqli_real_escape_string($con, $_POST['fullName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $role = mysqli_real_escape_string($con, $_POST['role']);
    $otp = rand(111111,999999);
    $unique_id = rand(time(), 100000000);
    if(!empty($fullName) && !empty($email) && !empty($password)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_search = mysqli_query($con, "SELECT email FROM signup WHERE email = '$email'");
            if(mysqli_num_rows($email_search) > 0) {
                echo "Email already exists";
            }else {
                $encrypt_password = password_hash($password, PASSWORD_BCRYPT);
                $insert = "INSERT INTO signup(fullName, email, password, role, otp, uniqueId,status)
                VALUES('$fullName','$email','$encrypt_password','$role','$otp','$unique_id','inactive')";
                $insert_query = mysqli_query($con, $insert);
                
                if($insert_query && sendMail($email, $fullName, $otp)) {
                    $_SESSION['email'] = $_SESSION['otpEmail'] = $email;
                    $_SESSION['role'] = $role;
                    $_SESSION['uniqueId'] = $unique_id;
                    echo "success";
                }else {
                    echo "Failed to insert data";
                }
            }
        }else {
            echo "Please enter a valid email";
        }
    }else {
        echo 'All fields must be filled';
    }

    function sendMail($to, $fullName, $otp) {
        $headers = "From: " . strip_tags("K.J Somaiya Polytechnic <noreply.kjsp@gmail.com>") . "\r\n";
        $headers .= "Reply-To: ". strip_tags("K.J Somaiya Polytechnic <noreply.kjsp@gmail.com>") . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $subject = "Your OTP for creating account";
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
                    <h4 style="font-size: 16px;">Your account has been almost create!!</h4>
                    <p style="font-size: 18px;">You One time password (OTP) to create your account</p>
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
