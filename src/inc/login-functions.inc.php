<?php

    function emptyInputLogin($name, $pwd){
        if(empty($name)) return true;
        if(empty($pwd)) return true;

        return false;
    }

    function uidExists($con, $uid){
        return db_user_uidExists($con, $uid);
    }

    function verifyLogin($con, $name, $pwd){
        
    }

?>