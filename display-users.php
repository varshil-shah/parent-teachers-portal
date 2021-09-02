<?php
    session_start();
    include_once 'php/config.php';
    if(!isset($_SESSION['email']) && !isset($_SESSION['uniqueId'])) {
        header('location: ./sign-in.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="common/display-users.css">
    <title>CHAT - USERS</title>
</head>

<body>
    <section>
        <div class="container">

            <div class="current__user">
                <div class="current__user__section">
                    <img src="images/user.png" class="user__icon" alt="dummy icon">
                    <div class="current__user__details">
                        <?php
                            $uniqueId = $_SESSION['uniqueId'];
                            $sql = "SELECT fullName, email FROM signup WHERE uniqueId = '$uniqueId'";
                            $sql_query = mysqli_query($con, $sql);
                            if(mysqli_num_rows($sql_query) > 0) {
                                $row = mysqli_fetch_assoc($sql_query);
                            }
                        ?>
                        <h4><?php echo $row['fullName'] ?></h4>
                        <h5><?php echo $row['email'] ?></h5>
                    </div>
                </div>
            </div>

            <input type="search" placeholder="Enter name to search..." class="search">

            <div class="available__user">
                
            </div>
        </div>
    </section>
    <div class="bg-balls"></div>
    <script src="./javascript/display-chat-users.js"></script>
</body>

</html>
