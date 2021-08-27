<?php
    session_start();
    if(!isset($_SESSION['email'])) {
        ?>
            <script>
                location.replace('./index.php');
            </script>
        <?php
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./common/forms.css">
    <title>OTP</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="user signInBox">
                <div class="imgBx">
                    <img src="./images/login-min.jpg" id="image" alt="">
                </div>
                <div class="formBx">
                    <form action="#" method="POST">
                        <h3 class="logo">Somaiya Polytechnic</h3>
                        <p class="notify">If you haven't found mail, please check under spam folder</p>
                        <h2>VERIFY OTP</h2>
                        <input required type="number" placeholder="Enter 6 digit OTP" name="otp">
                        <input type="submit" value="Verify OTP" class="otpButton">
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-balls"></div>
    </section>
    <script>
        let compressImage = document.querySelector('#image');
        let qualityImage = document.createElement('img');

        qualityImage.src = './images/login.jpg';
        qualityImage.onload = function() {
            compressImage.src = this.src;
        }
    </script>
    <script src="./javascript/otp.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
</body>

</html>
