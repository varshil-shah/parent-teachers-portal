<?php
    session_start();
    include_once './config.php';
    $currentUserEmail = $_SESSION['email'];
    $sql = "SELECT * FROM signup WHERE NOT email = '$currentUserEmail' AND role = 'parent'";
    $sql_query = mysqli_query($con, $sql);
    $result = "";
    if(mysqli_num_rows($sql_query) > 0) {
        while($row = mysqli_fetch_assoc($sql_query)) {
            $result .= 
            '
            <div class="parents__box">
                <div class="user__data">
                    <h5>'.$row['fullName'].'</h4>
                    <p>'.$row['email'].'</p>
                </div>
                <div class="user__data__check">
                    <input type="checkbox" name="users[]" value="'.$row['email'].'" class="email__checkbox">
                </div>
            </div>
            ';
        }
    }else {
        $result = "No user found !!";
    }
    echo $result;
?>
