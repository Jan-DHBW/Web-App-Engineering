<?php

    if(isset($_POST["submit"])){
        $name = addlashes($_POST["uid"]);
        $email = addlashes($_POST["email"]);
        $emailRepeat = addlashes($_POST["emailRepeat"]);
        $pwd = addlashes($_POST["pwd"]);
        $pwdRepeat = addlashes($_POST["pwdRepeat"]);

        require_once("dhb.inc.php");
        require_once("signup-functions.inc.php");

        if(emptyInputSignup($name, $email, $emailRepeat, $pwd, $pwdRepeat) !== false){
            head("location: ../signup.php?err=emptyInput");
            exit();
        }

        if(invalidUid($name) !== false){
            head("location: ../signup.php?err=invalidUid");
            exit();
        }

        if(invalidEmail($email) !== false){
            head("location: ../signup.php?err=invalidEmail");
            exit();
        }

        if(emailMatch($email, $emailRepeat) !== false){
            head("location: ../signup.php?err=emailMissmatch");
            exit();
        }

        if(emailExists($con, $uid) !== false){
            head("location: ../signup.php?err=emailTaken");
            exit();
        }

        if(pwdMatch($pwd, $pwdRepeat) !== false){
            head("location: ../signup.php?err=pwdMissmatch");
            exit();
        }

        if(uidExists($conn, $uid) !== false){
            head("location: ../signup.php?err=uidTaken");
            exit();
        }

        createUser($conn, $name, $email, $pwd);

    }else{
        head("location: ../signup.php")
        exit();
    }

?>