<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./common/forms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>SIGN UP</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="user signInBox">
                <div class="imgBx">
                    <img src="./images/signup.jpg" alt="">
                </div>
                <div class="formBx">
                    <form action="#" method="POST">
                        <div id="loading"></div>
                        <h3 class="logo">Somaiya Polytechnic</h3>
                        <h2>SIGN UP</h2>
                        <input required type="text" placeholder="Enter your full name" name="fullName">
                        <input required type="email" placeholder="Enter email address" name="email">
                        <div class="wrap-icons">
                            <input required type="password" placeholder="Enter password" name="password">
                            <i class="fas fa-eye eye"></i>
                        </div>
                        <div class="wrap-icons">
                            <select name="role">
                                <option value="parent">Parent</option>
                                <option value="teacher">Teacher</option>
                            </select>
                            <i class="fas fa-chevron-down drop-down"></i>
                        </div>
                        <input type="submit" value="Sign Up" name="login" class="signUpButton">
                        <p class="signup">Don't have an account ? <a href="./sign-in.php">SIGN IN</a></p>
                        <p class="signup">Forgot password ? <a href="./forgot-password.php">CLICK</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-balls"></div>`

    <script src="./javascript/eye-dropdown.js"></script>
    <script src="./javascript/signup.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
