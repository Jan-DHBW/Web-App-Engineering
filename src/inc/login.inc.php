<?php
    if(isset($_POST["submit"])){
        $name = $_POST["uid"];
        $pwd =  $_POST["pwd"];
        
        require_once("inc/db/dhb.inc.php");
        require_once("login-functions.inc.php");

        if(emptyInputLogin($name, $pwd) !== false){
            header("location: ../login.php?err=emptyInput");
            exit();
        }

    }else{
        header("location: ../login.php");
        exit();
    }
?>