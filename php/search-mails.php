<?php
    session_start();
    include_once './config.php';
    include_once './common.php';
    $searchValue = mysqli_real_escape_string($con, $_POST['search']);
    $currentEmail = $_SESSION['email'];
    $search = "SELECT * FROM email_send WHERE title LIKE '%$searchValue%' AND users LIKE '%$currentEmail%' ORDER BY id DESC";
    $search_query = mysqli_query($con, $search);
    $result = "";
    if(mysqli_num_rows($search_query) > 0) {
        while($row = mysqli_fetch_assoc($search_query)) {
            $result .= '
            <div class="card">
                <h4 class="card__header">'.$row["title"].'</h4>
                <p class="card__msg">'.$row["message"].'</p>
                <div class="card__details">
                    <p class="date">'.$row["date"].'</p>
                    <p class="teacher">'.getTeacherName($con, $row['uniqueId']).'</p>
                </div>
            </div>';
        }
    }else {
        $result .= '<h3 class="center">Email not found. Please check if you have some typo ...</h3>';
    }
    echo $result;
?>
