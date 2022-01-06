<?php


if (isset($_POST)) {
    $uid = addslashes($_POST["uid"]);
    $email = addslashes($_POST["email"]);
    $emailRepeat = addslashes($_POST["emailRepeat"]);
    $pwd = addslashes($_POST["pwd"]);
    $pwdRepeat = addslashes($_POST["pwdRepeat"]);

    require_once("db/dbh.inc.php");
    require_once("db/db.user.createUser.inc.php");
    require_once("db/db.user.uidExists.inc.php");
    require_once("db/db.user.emailExists.inc.php");
    require_once("db/db.user.sendAuthEmail.inc.php");
    require_once("hash.inc.php");
    require_once("signup-functions.inc.php");

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

    if (emailExists($DB_spellbook, $email) !== false) {
        header("location: ../signup.php?err=emailTaken");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== true) {
        header("location: ../signup.php?err=pwdMissmatch");
        exit();
    }

    if (uidExists($DB_spellbook, $uid) !== false) {
        header("location: ../signup.php?err=uidTaken");
        exit();
    }

    if (!createUser($DB_spellbook, $uid, $email, $pwd)) {
        header("location: ../signup.php?err=signUpFailed");
    } else {
        header("location: ../login.php?msg=signedUp");
    }
} else {
    header("location: ../signup.php");
    exit();
}
