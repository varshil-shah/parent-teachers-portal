<?php
    session_start();
    if(!isset($_SESSION['forgotEmail'])) {
        header('location: ./sign-in.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./common/forms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Forgot Password</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="user signInBox">
                <div class="imgBx">
                    <img src="./images/signup.jpg" alt="">
                </div>
                <div class="formBx">
                    <form method="POST" id="forgotPasswordForm">
                        <div id="loading"></div>
                        <h3 class="logo">Somaiya Polytechnic</h3>
                        <h2>Update Password</h2>
                        <input required type="number" placeholder="Enter 6 digit OTP" name="otp">
                        <input required type="password" placeholder="Enter new password" name="password">
                        <input required type="password" placeholder="Confirm new password" name="cpassword">
                        <input type="submit" value="UPDATE" class="updatePassword">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-balls"></div>
    <script src="./javascript/update-password.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
