<?php

    function emptyLoginInput($StaffID, $pwd){
        $result = true; // boolean true or false
        if (empty($StaffID) || (empty($pwd))){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }

    function sidExists($conn, $StaffID, $pwd){
        // code.....
        
    }

    function loginStaff($conn, $StaffID, $pwd){
        $sidExists = sidExists($conn, $StaffID, $pwd);
    }
?>