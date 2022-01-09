<?php


if (isset($_POST)) {

    require_once("db/dbh.inc.php");
    require_once("db/db.user.createUser.inc.php");
    require_once("db/db.user.uidExists.inc.php");
    require_once("db/db.user.emailExists.inc.php");
    require_once("db/db.user.createHashTokenAuthEmail.inc.php");
    require_once("sendEmail.inc.php");
    require_once("hash.inc.php");
    require_once("signup-functions.inc.php");

    $uid = sanitize($_POST["uid"]);
    $email = sanitizeEmail($_POST["email"]);
    $emailRepeat = sanitizeEmail($_POST["emailRepeat"]);
    $pwd = addslashes($_POST["pwd"]);
    $pwdRepeat = addslashes($_POST["pwdRepeat"]);

    

    if (emptyInputSignup($uid, $email, $emailRepeat, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?err=emptyInput");
        exit();
    }

    if (invalidUid($uid) !== false) {
        header("location: ../signup.php?err=invalidUid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?err=invalidEmail");
        exit();
    }

    if (emailMatch($email, $emailRepeat) !== true) {
        header("location: ../signup.php?err=emailMissmatch");
        exit();
    }

    if (emailExists($DB, $email) !== false) {
        header("location: ../signup.php?err=emailTaken");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== true) {
        header("location: ../signup.php?err=pwdMissmatch");
        exit();
    }

    if (uidExists($DB, $uid) !== false) {
        header("location: ../signup.php?err=uidTaken");
        exit();
    }

    //create new user
    $_id = createUser($DB, $uid, $email, $pwd);

    //create auth hash token
    $token = createAuthHashToken($DB, $_id);

    //send email with auth token
    sendEmailAuthEmail($email, $token);

    header("location: ../../index.html");
} else {
    header("location: ../signup.php");
    exit();
}
