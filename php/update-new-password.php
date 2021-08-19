<?php
    session_start();
    include_once './config.php';
    $email = $_SESSION['forgotEmail'];
    $otp = mysqli_real_escape_string($con, $_POST['otp']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if(!empty($otp) && !empty($password) && !empty($cpassword)) {
        $sql = "SELECT * FROM signup WHERE email = '$email'";
        $sql_query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($sql_query);
        if($row['otp'] == $otp) {
            if($password === $cpassword) {
                $hash_password = password_hash($password, PASSWORD_BCRYPT);
                $update = "UPDATE signup SET password = '$hash_password' WHERE email = '$email'";
                $update_query = mysqli_query($con, $update);
                if($update_query) {
                    unset($_SESSION['forgotEmail']);
                    echo "Password has been updated successfully";
                }else {
                    echo "Failed to update password";
                }
            }else {
                echo "Passwords are not matching";
            }
        }else {
            echo "Invalid OTP";
        }
    }else {
        echo "All fields must be filled";
    }
?>
