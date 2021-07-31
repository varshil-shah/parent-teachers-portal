<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="../common/forms.css">
    <title>SIGN IN</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="user signInBox">
                <div class="imgBx">
                    <img src="../images/login.jpg" alt="">
                </div>
                <div class="formBx">
                    <form action="">
                        <h3 class="logo">Somaiya Polytechnic</h3>
                        <h2>SIGN IN</h2>
                        <input required autocomplete="off" type="email" placeholder="Enter email address" name="email" id="email">
                        <div class="wrap-icons">
                            <input required autocomplete="off" type="password" placeholder="Enter password" name="password">
                            <i class="fas fa-eye eye"></i>
                        </div>
                        <input type="submit" value="Login" class="login">
                        <p class="signup">Already have an account ? <a href="../index.php">SIGN UP</a></p>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-balls"></div>
    </section>
    <script src="../javascript/eye-dropdown.js"></script>
    <script src="../javascript/signin.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>;
</body>

</html>