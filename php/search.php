<?php
    session_start();
    include_once './config.php';
    include_once './common.php';
    $searchValue = mysqli_real_escape_string($con, $_POST['search']);
    $page = mysqli_real_escape_string($con, $_POST['page']);
    if(isset($_POST['forPage'])) {
        $forPage = $_POST['forPage'];
        $search = "SELECT * FROM notice WHERE title LIKE '%$searchValue%' AND pageName = '$page' AND forPage = '$forPage' ORDER BY notice.nid DESC";
    }else {
        $search = "SELECT * FROM notice WHERE title LIKE '%$searchValue%' AND pageName = '$page' ORDER BY notice.nid DESC";
    }
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
                <div class="card__details">
                    <button class="download__pdf">Attachments</button>
                    '.checkRole($row).'
                </div>
            </div>';
        }
    }else {
        $result .= '<h3 class="center">Notice not found. Please check if you have some typo ...</h3>';
    }
    echo $result;

    function checkRole($row) {
        if($_SESSION['role'] == 'teacher') {
            return '<a id="deleteIcon" href="../php/delete-notice.php?id='.$row['nid'].'"> <i class="fas fa-trash-alt trash__icon"></i></a>';
        }
    }
?>
