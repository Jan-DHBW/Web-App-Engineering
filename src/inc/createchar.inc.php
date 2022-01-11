<?php


if(isset($_POST['btnSubNewChar'])){
    session_start();

    //required dependencies
    require_once('createchar-functions.inc.php');
    require_once('hash.inc.php');
    require_once('regex.inc.php');
    require_once('db/dbh.inc.php');
    require_once('regex.inc.php');
    require_once('db/db.char.createCharacter.inc.php');
    require_once('db/db.user.uidExists.inc.php');

    //check user id isset

    $name = $_POST['name'];
    $class = $_POST['class'];
    $level = $_POST['level'];
    $uid = $_SESSION['uid'];

    //check all vars isset

    if(emptyInput($uid, $name, $level, $class))
    {
        header("location: ../createchar.php?err=emptyInput");
        exit();
    }


    if(!uidExists($DB, $uid))
    {
        header("location: ../createchar.php?err=invalidUserId");
        exit();
    }


    if(invalidCharacterName($name))
    {
        header("location: ../createchar.php?err=invalidName");
        exit();
    }


    if(invalidCharacterClass($class))
    {
        header("location: ../createchar.php?err=invalidClass");
        exit();
    }


    if(invalidCharacterLevel($level))
    {
        header("location: ../createchar.php?err=invalidLevel");
        exit();
    }
    
    $cid = getHashToken($uid);

    db_char_createCharacter($DB, $cid ,$uid, $name, $class, $level);

    header("location: ../choosechar.php?msg=charCreated");
    exit();
}


header("location: ../errorPage.php?err=pageNotFound");
exit();