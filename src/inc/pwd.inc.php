<?php
    function hashPwd($pwd){
        return password_hash($pwd, PASSWORD_ARGON2ID);
    }

    function verifyPwd($pwd, $hash){
        return password_verify($pwd, $hash);
    }

?>