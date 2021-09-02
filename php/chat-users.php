<?php
    session_start();
    include_once './config.php';
    if(isset($_SESSION['uniqueId']) && isset($_SESSION['role'])) {
        $currentUserId = $_SESSION['uniqueId'];
        $currentUserRole = $_SESSION['role'];
        $result = '';
        if($currentUserRole == 'teacher') {
            $sql = "SELECT fullName, email, uniqueId FROM signup WHERE NOT uniqueId = '$currentUserId' AND role = 'parent'";
        }else {
            $sql = "SELECT fullName, email, uniqueId FROM signup WHERE NOT uniqueId = '$currentUserId' AND role = 'teacher'";
        }
        $sql_query = mysqli_query($con, $sql);
        if(mysqli_num_rows($sql_query) > 0) {
            while($row = mysqli_fetch_assoc($sql_query)) {
                $result .= '
                    <a href="chat.php?id='.$row['uniqueId'].'" class="user__link">
                        <div class="available__user__section">
                            <div class="available__user__node">
                                <img src="images/user.png" class="user__icon" alt="dummy icon">
                                <div class="available__user__detail">
                                    <h4>'.$row['fullName'].'</h4>
                                    <h5>'.$row['email'].'</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                ';
            }
        }else {
            $result = '<p class="text">No user found</p>';
        }
    }else {
        header('location: ../sign-in.php');
    }

    echo $result;
?>
