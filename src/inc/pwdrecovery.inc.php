<?php

if (isset($_POST['pwdrecovery'])) {
    
    //require dependecies
    require_once('db/dbh.inc.php');
    require_once("db/db.user.createHashTokenResetPwd.inc.php");
    require_once("db/db.user.emailExists.inc.php");
    require_once("hash.inc.php");
    require_once("pwdrecovery-functions.inc.php");

    //sanitize user input
    $email = sanitizeEmail($_POST['email']);

    //check email exists
    if(emailExists($DB, $email) === false){
        //redirect somewhere else
        header("location: ../pwdrecovery.php?msg=requestSent");
        exit();
    }

    //create reset token
    $token = createResetHashToken($DB, $email);

    //send email with reset token
    sendEmailResetPwd($email, $token);

    //redirect somewhere else
    header("location: ../pwdrecovery.php?msg=requestSent");
}