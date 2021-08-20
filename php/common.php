<?php
    function getTeacherName($con, $uniqueId) {
        $sql = "SELECT fullName FROM signup WHERE uniqueId = '$uniqueId'";
        $sql_query = mysqli_query($con, $sql);
        if(mysqli_num_rows($sql_query) > 0) {
            $row = mysqli_fetch_assoc($sql_query);
            $teacherName = $row['fullName'];
            return $teacherName;
        }
        return null;
    }
?>
