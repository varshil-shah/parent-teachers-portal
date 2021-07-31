<?php
    include_once './config.php';
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if(!empty($email) && !empty($password)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL) && filterEmail($email)) {
            $search_email = "SELECT * FROM signup WHERE email = '$email'";
            $search_email_query = mysqli_query($con, $search_email);
            if(mysqli_num_rows($search_email_query) > 0) {
                $row = mysqli_fetch_assoc($search_email_query);
                $databasePassword = $row['password'];
                if(password_verify($password, $databasePassword) && $row['status'] == 'active') {
                    echo 'success';
                }else {
                    echo "Password isn't matching or OTP is not verified";
                }
            }else {
                echo 'Email not found in database';
            }
        }else {
            echo "Please enter somaiya's email address";
        }
    }else {
        echo "No field should be empty";
    }

    function filterEmail($email) {
        if(strpos($email, '@somaiya.edu')) {
            return true;
        }
        return false;
    }
?>