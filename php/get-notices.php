<?php
    session_start();    
    include_once './config.php';
    $page = mysqli_real_escape_string($con, $_POST['page']);
    $display = "SELECT * FROM notice n LEFT JOIN signup s ON n.uniqueId = s.uniqueId
                WHERE pageName = '$page' ORDER BY n.nid DESC";
    $display_query = mysqli_query($con, $display);
    $result = "";
    if(mysqli_num_rows($display_query) > 0) {
        while($row = mysqli_fetch_assoc($display_query)) {
            $result .= '
            <div class="card" onmouseover="clearPageRefreshInterval(this)" onmouseout="setPageRefreshInterval(this)">
                <h4 class="card__header">'.$row["title"].'</h4>
                <p class="card__msg">'.$row["message"].'</p>
                <div class="card__details">
                    <p class="date">'.$row["date"].'</p>
                    <p class="teacher">'.$row['fullName'].'</p>
                </div>
                <div class="card__details">
                    <a class="download__pdf" href="../php/download.php?id='.$row['nid'].'">Attachments</a>
                    '.checkRole($row).'
                </div>
            </div>';
        }
    }else {
        $result .= '<h3 class="center">Notice will be displayed once uploaded by professor</h3>';
    }
    echo $result;

    function checkRole($row) {
        if($_SESSION['role'] == 'teacher') {
            return '<button class="deleteIcon" onclick="handleNoticeDelete(event, '.$row['nid'].')" ><i class="fas fa-trash-alt trash__icon"></i></button>';
        }
    }
?>