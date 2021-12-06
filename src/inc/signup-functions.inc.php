<?php
    function emptyInputSignup($name, $email, $emailRepeat, $pwd, $pwdRepeat){
        if(empty($name)) return true;
        if(empty($email)) return true;
        if(empty($emailRepeat)) return true;
        if(empty($pwd)) return true;
        if(empty($pwdRepeat)) return true;

        return false;
    }

    function invalidUid($username){
        if(preg_match("/^[a-zA-Z0-9]*$/",$username)) return true;

        return false;
    }

    function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return true;

        return false;
    }

    function emailMatch($email, $emailRepeat){
        if($email !== $emailRepeat) return true;

        return false;
    }

    function emailExists($con, $uid){

    }

    function pwdMatch($pwd, $pwdRepeat){
        if($pwd !== $pwdRepeat) return true;

        return false;
    }

    function uidExists($uid){
        $filter = ["username" => implode($uid)];
        $options = [];
        $query = new MongoDB\Driver\Query($filter, $options);
    }

    function createUser($con, $name, $email, $pwd){

    }
    
?>