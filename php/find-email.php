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
            $subject = "Forgot Password";
            $message = "Hello Mr/Mrs $fullName\nYour OTP to change password is $rand";
            $from = "From: K.J Somaiya Polytechnic<YOUR-EMAIL-ADDRESS>";
            if($update_query && mail($email, $subject, $message, $from)) {
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
?>
