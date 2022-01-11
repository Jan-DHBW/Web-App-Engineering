<?php
    if(isset($_POST['btnLogin'])){
        
        require_once("db/dbh.inc.php");
        require_once("db/db.user.uidExists.inc.php");
        require_once("db/db.user.getId.inc.php");
        require_once("db/db.user.isEmailVerifiedByName.inc.php");
        require_once("db/db.user.verifyPasswordByName.inc.php");
        require_once("hash.inc.php");
        require_once('regex.inc.php');
        require_once("login-functions.inc.php");

        $name = $_POST["uid"];
        $pwd =  $_POST["pwd"];

        if(emptyInputLogin($name, $pwd) !== false){
            header("location: ../../index.html?err=emptyInput");
            exit();
        }

        $name = e($name);

        
        if(!db_user_isEmailVerifiedByName($DB, $name)){
            header("location: ../../index.html?err=emailNotConfirmed");
            exit();
        }


        if(!verifyLogin($DB, $name, $pwd)){
            header("location: ../../index.html?err=incorrectLogin");
            exit();
        }

        

        session_start();
        session_regenerate_id(true);


        $_SESSION['uid'] = getUIDByName($DB, $name);
        $_SESSION['username'] = $name;

        header("location: ../choosechar.php?msg=successfullLogin");
        exit();
    }

header("location: ../../");
exit();
    

