<?php
    session_start();
    include_once './config.php';
    $otp = mysqli_real_escape_string($con, $_POST['otp']);
    $email = $_SESSION['email'];
    if(!empty($otp)) {
        $sql = mysqli_query($con,"SELECT otp from signup WHERE email = '$email'");
        if(mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            $databaseOtp = $row['otp'];
            if($databaseOtp == $otp) {
                $update = "UPDATE signup SET status = 'active' WHERE email = '$email'";
                if(mysqli_query($con, $update)) {
                    echo "Valid OTP";
                }
            }else {
                echo "Invalid OTP";
            }
        }else {
            echo "Email doesn't exist";
        }
    }else {
        echo "Otp field can't be empty";
    }
?>