<?php

session_start();


if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    header('location: ../errorPage.php?err=pageNotFound');
    exit();
}

if(!isset($_SESSION['uid']) || !isset($_POST['btnChangePwd'])){
    header('location: ../errorPage.php?err=pageNotFound');
    exit();
}




//require dependencies
require_once('changepass-functions.inc.php');
require_once('regex.inc.php');
require_once('hash.inc.php');
require_once('db/dbh.inc.php');
require_once('db/db.user.updateUserPwdByUID.inc.php');
require_once('db/db.user.uidExists.inc.php');
require_once('db/db.user.verifyPasswordByUID.inc.php');


$uid = sanitizeHashToken($_SESSION['uid']);

$oldPwd = $_POST['oldPwd'];
$newPwd = $_POST['newPwd'];
$newPwdRepeat = $_POST['newPwdRepeat'];

//check iputs empty

if(emptyInput($oldPwd, $newPwd, $newPwdRepeat)){
    header('location: ../changepass.php?err=emptyInput');
    exit();
}

//check newPwd and newPwdRepeat match

if(!pwdMatch($newPwd, $newPwdRepeat)){
    header('location: ../changepass.php?err=pwdMissmatch');
    exit();
}

//check uid exists

if(!uidValid($DB, $uid)){
    header('location: logout.php');
    exit();
}


//check verify oldPwd

if(!verifyOldPwd($DB, $uid, $oldPwd)){
    header('location: ../changepass.php?err=invalidPwd');
    exit();
}


//set new uset pwd

updateUserPwd($DB, $uid, $newPwd);
header('location: ../changepass.php?msg=pwdChanged');
exit();









