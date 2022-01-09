<?php

    function emptyInputLogin($name, $pwd){
        if(empty($name)) return true;
        if(empty($pwd)) return true;

        return false;
    }

    function nameExists($con, $name){
        return db_user_uidExists($con, $name);
    }

    function verifyLogin($con, $uid, $pwd){
        return db_user_verifyPassword($con, $name, $pwd);
    }

    function getUserId($con, $name){
        return db_user_getId($con, $name);
    }

?>