<?php
    session_start();
    include_once './config.php';
    if(isset($_SESSION['uniqueId']) && isset($_SESSION['role'])) {
        $search = mysqli_real_escape_string($con, $_POST['searchValue']);
        $currentUserId = $_SESSION['uniqueId'];
        $role = $_SESSION['role'];
        $result = '';
        $currentUserRole = $role == 'teacher' ? 'parent' : 'teacher';
        $sql = "SELECT fullName, email, uniqueId FROM signup WHERE role = '$currentUserRole' AND fullName LIKE '%$search%';";
        $sql_query = mysqli_query($con, $sql);
        if(mysqli_num_rows($sql_query) > 0 && !empty($search)){
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
                            <small class="status"></small>
                        </div>
                    </a>
                ';
            }
        }else {
            $result = "<p class='center-msg'>No user found with name ".$search."</p>";
        }
        echo $result;
    }else {
        header('location: ../sign-in.php');
    }
?>
