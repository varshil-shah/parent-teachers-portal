<?php
    session_start();
    include_once "./config.php";
    if(isset($_SESSION['uniqueId'])) {
        $outgoing_id = $_SESSION['uniqueId'];
        $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM chat WHERE (outgoing_msg_id = '$outgoing_id' AND incoming_msg_id = '$incoming_id')
        OR (outgoing_msg_id = '$incoming_id' AND incoming_msg_id = '$outgoing_id');";
        $sql_query = mysqli_query($con, $sql);
        if(mysqli_num_rows($sql_query) > 0) {
            while($row = mysqli_fetch_assoc($sql_query)) {
                if($row['outgoing_msg_id'] == $outgoing_id) {
                    $output .= '
                        <div class="chat outgoing">
                            <div class="details">
                                <p>'.$row['message'].'</p>
                            </div>
                        </div>
                    ';
                }else {
                    $output .= '
                        <div class="chat incoming">
                            <div class="details">
                                <p>'.$row['message'].'</p>
                            </div>
                        </div>
                    ';
                }
            }
        }else {
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else {
        header('location: ../sign-in.php');
    }
?>
