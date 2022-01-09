<?php

if(isset($_POST['resetpwd'])){
    require_once("db/dbh.inc.php");
    require_once("hash.inc.php");
    require_once("resetPwd-functions.inc.php");


    $token = sanitizeHashToken($_POST['token']);

    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdRepeat'];


    if (emptyInput($pwd, $pwdRepeat) !== false) {
        header('location: ../authResetPwd.php?token='.$token.'&err=emptyInput');
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== true) {
        header('location: ../authResetPwd.php?token='.$token.'&err=pwdMissmatch');
        exit();
    }


    $pwdHash = hashPwd($pwd);

    updateUserPwd($DB, $token, $pwdHash);

    destroyHashTokenResetPwd($DB, $token);

    header('location: ../../index.html');
    exit();
}

header('location: ../../index.html');
exit();