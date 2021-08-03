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
            <div class="card">
                <h4 class="card__header">'.$row["title"].'</h4>
                <p class="card__msg">'.$row["message"].'</p>
                <div class="card__details">
                    <p class="date">'.$row["date"].'</p>
                    <p class="teacher">'.$row['fullName'].'</p>
                </div>
                <div class="card__details">
                    <button class="download__pdf">Download attachments</button>
                    '.checkRole($row).'
                </div>
            </div>';
        }
    }else {
        $result .= "No Data found";
    }
    echo $result;

    function checkRole($row) {
        if($_SESSION['role'] == 'teacher') {
            return '<a id="deleteIcon" href="../user/main.php?id='.$row['nid'].'"> <i class="fas fa-trash-alt trash__icon"></i></a>';
        }
    }
?>