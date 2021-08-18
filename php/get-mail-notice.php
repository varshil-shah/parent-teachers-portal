<?php
    session_start();
    include_once './config.php';
    $currentUserEmail = $_SESSION['email'];
    $sql = "SELECT * FROM email_send WHERE users LIKE '%$currentUserEmail%'";
    $sql_query = mysqli_query($con, $sql);
    $result = "";
    if(mysqli_num_rows($sql_query) > 0) {
        while($row = mysqli_fetch_assoc($sql_query)) {
            $array_of_email = explode(',',$row['users']);
            for($i = 0; $i < count($array_of_email); $i++) {
                if($currentUserEmail == $array_of_email[$i]) {
                    // echo $i." ".$array_of_email[$i]."<br>";
                    $result .= '
                        <div class="card" onmouseover="clearPageRefreshInterval(this)" onmouseout="setPageRefreshInterval(this)">
                            <h4 class="card__header">'.$row["title"].'</h4>
                            <p class="card__msg">'.$row["message"].'</p>
                            <div class="card__details">
                                <p class="date">'.$row["date"].'</p>
                                <p class="teacher">'.$row['teacher'].'</p>
                            </div>
                        </div>
                        ';
                }
            }
        }
    }else {
        $result .= "No data found !!";
    }
    echo $result;
?>
