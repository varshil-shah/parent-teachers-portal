<?php
    function encodeData($data) {
        if(!empty($data)) {
            $alphabet = "[ abcdefghijklmnopqrstuvwxyz!@#123$%^456&*()7890_+-=ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $key = " [XZNLWEBGJHQDYVTKFUOMPCIASRxznlwebgjhqdyvtkfuompciasr789!@#456$%^123&*()0_+-=";
            $dataInArray = str_split($data);
            $encrypted = "";
            for($i = 0; $i < count($dataInArray); $i++) {
                $position = strpos($alphabet, $dataInArray[$i]);
                if($position != false) {
                    $encrypted .= $key[$position];
                }else {
                    $encrypted .= $dataInArray[$i];
                }
            }
            return $encrypted;
        }
    }

    function decodeData($encryptedData) {
        if(!empty($encryptedData)) {
            $alphabet = "[ abcdefghijklmnopqrstuvwxyz!@#123$%^456&*()7890_+-=ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $key = " [XZNLWEBGJHQDYVTKFUOMPCIASRxznlwebgjhqdyvtkfuompciasr789!@#456$%^123&*()0_+-=";
            $dataInArray = str_split($encryptedData);
            $decrypted = "";
            for($i = 0; $i < count($dataInArray); $i++) {
                $position = strpos($key, $dataInArray[$i]);
                if($position != false) {
                    $decrypted .= $alphabet[$position];
                }else {
                    $decrypted .= $dataInArray[$i];
                }
            }
            return $decrypted;
        }
    }
?>
