<?php
    session_start();
    include_once './config.php';
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if(!empty($email) && !empty($password)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $search_email = "SELECT * FROM signup WHERE email = '$email'";
            $search_email_query = mysqli_query($con, $search_email);
            if(mysqli_num_rows($search_email_query) > 0) {
                $row = mysqli_fetch_assoc($search_email_query);
                $databasePassword = $row['password'];
                if(password_verify($password, $databasePassword) ) {
                    if($row['status'] == 'active') {
                        $_SESSION['role'] = $row['role'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['uniqueId'] = $row['uniqueId'];
                        echo 'success';
                    }else {
                        echo "You haven't verified your account";
                    }
                }else {
                    echo "Password isn't matching";
                }
            }else {
                echo 'Email not found in database';
            }
        }else {
            echo "Email not found !!";
        }
    }else {
        echo "No field should be empty";
    }
?>
