<?php


if (isset($_POST)) {

    require_once("db/dbh.inc.php");
    require_once("db/db.user.createUser.inc.php");
    require_once("db/db.user.nameExists.inc.php");
    require_once("db/db.user.emailExists.inc.php");
    require_once("db/db.user.createHashTokenAuthEmail.inc.php");
    require_once("hash.inc.php");
    require_once("signup-functions.inc.php");

    $name = sanitize($_POST["uid"]);
    $email = sanitizeEmail($_POST["email"]);
    $emailRepeat = sanitizeEmail($_POST["emailRepeat"]);
    $pwd = addslashes($_POST["pwd"]);
    $pwdRepeat = addslashes($_POST["pwdRepeat"]);

    

    if (emptyInput($name, $email, $emailRepeat, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?err=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
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

    if (nameExists($DB, $name) !== false) {
        header("location: ../signup.php?err=uidTaken");
        exit();
    }

    //create new user
    $uid = createUser($DB, $name, $email, $pwd);

    //create auth hash token
    $token = createAuthHashToken($DB, $uid);

    //send email with auth token
    sendEmailAuthEmail($email, $token);

    header("location: ../../index.html");
} else {
    header("location: ../signup.php");
    exit();
}
