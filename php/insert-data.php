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
        if(filter_var($email, FILTER_VALIDATE_EMAIL) && filterEmail($email)) {
            $email_search = mysqli_query($con, "SELECT email FROM signup WHERE email = '$email'");
            if(mysqli_num_rows($email_search) > 0) {
                echo "Email already exists";
            }else {
                $encrypt_password = password_hash($password, PASSWORD_BCRYPT);
                $insert = "INSERT INTO signup(fullName, email, password, role, otp, uniqueId,status)
                VALUES('$fullName','$email','$encrypt_password','$role','$otp','$unique_id','inactive')";
                $insert_query = mysqli_query($con, $insert);
                $subject = "One Time Password";
                $msg = "Hello Mr/Mrs. " . $fullName ."\nYour one time password for sign-up is " .$otp;
                $from = "From: K.J Somaiya Polytechnic<jerryshah1004@gmail.com>";
                if($insert_query && mail($email, $subject, $msg, $from)) {
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $role;
                    $_SESSION['uniqueId'] = $unique_id;
                    echo "success";
                }else {
                    echo "Failed to insert data";
                }
            }
        }else {
            echo "Please enter somaiya email";
        }
    }else {
        echo 'All fields must be filled';
    }

    function filterEmail($email) {
        if(strpos($email, '@somaiya.edu')) {
            return true;
        }
        return false;
    }
    


?>