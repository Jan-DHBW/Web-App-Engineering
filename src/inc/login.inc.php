<?php
    if(isset($_POST['btnLogin'])){
        
        require_once("db/dbh.inc.php");
        require_once("db/db.user.uidExists.inc.php");
        require_once("db/db.user.getId.inc.php");
        require_once("db/db.user.verifyPassword.inc.php");
        require_once("hash.inc.php");
        require_once('regex.inc.php');
        require_once("login-functions.inc.php");

        //TODO:sanitize user input
        $name = $_POST["uid"];
        $pwd =  $_POST["pwd"];

        if(emptyInputLogin($name, $pwd) !== false){
            header("location: ../login.php?err=emptyInput");
            exit();
        }

        if(!verifyLogin($DB, $name, $pwd)){
            header("location: ../login.php?err=incorrectLogin");
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
    

