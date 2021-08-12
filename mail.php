<?php
    $to = "nishithsavla005@gmail.com,varshil.as@somaiya.edu";
    $sub = "Hello";
    $msg = "sdfbsjvbsvuifvguisvhcuivhasuihuhsdiuvhduiviaovbisdvbuiargwb";
    $headers = "From: Varshil Shah\nBcc: nishithsavla005@gmail.com,varshil.as@somaiya.edu";

    if(mail($to, $sub, $msg, $headers)) {
        echo "Mail sent";
    }else {
        echo "Failed to send email";
    }
?>
