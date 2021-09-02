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
    <link rel="stylesheet" href="common/chat.css">
    <title>CHAT - USERS</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="user__data">
                <a href="display-users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="./images/user.png" alt="">
                <div class="details">
                <?php
                    if(isset($_GET['id'])) {
                        $user_id = $_GET['id'];
                        $sql = "SELECT * FROM signup WHERE uniqueId = '$user_id'";
                        $sql_query = mysqli_query($con, $sql);
                        if(mysqli_num_rows($sql_query) > 0) {
                            $row = mysqli_fetch_assoc($sql_query);
                        }
                    }else{
                        session_destroy();
                        header('location: ../sign-in.php');
                    }
                ?>
                    <span><?php echo $row['fullName']; ?></span>
                </div>
            </div>

            <div class="user__chat">
                <!-- <div class="chat outgoing">
                    <div class="details">
                        <p>Hello Varshil Shah</p>
                    </div>
                </div> -->

                <!-- <div class="chat incoming">
                    <div class="details">
                        <p>Hi, how are you</p>
                    </div>
                </div> -->
            </div>

            <form action="#" class="typing__area">
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input__field" placeholder="Type a message here..."
                    autocomplete="off">
                <button id="chatButton"><i class="fab fa-telegram-plane"></i></button>
            </form>
        </div>
    </section>
    <div class="bg-balls"></div>
    <script src="javascript/chat.js"></script>
</body>

</html>
