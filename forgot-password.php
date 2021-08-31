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
                    <img src="./images/signup-min.jpg" id="image" alt="">
                </div>
                <div class="formBx">
                    <form method="POST" id="forgotEmailForm">
                        <div id="loading"></div>
                        <h3 class="logo">Somaiya Polytechnic</h3>
                        <h2>Forgot Password</h2>
                        <input required type="email" placeholder="Enter your email address" name="email">
                        <input type="submit" value="Send OTP" class="sendForgotOtp">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-balls"></div>
    <script src="./javascript/forgot-pass.js"></script>
    <script>
        let compressImage = document.querySelector('#image');
        let qualityImage = document.createElement('img');

        qualityImage.src = './images/signup.jpg';
        qualityImage.onload = function() {
            compressImage.src = this.src;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
