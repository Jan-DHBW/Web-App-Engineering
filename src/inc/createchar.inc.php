<?php


if(isset($_POST['btnSubNewChar'])){
    session_start();

    //required dependencies
    require_once('createchar-functions.inc.php');
    require_once('hash.inc.php');
    require_once('db/dbh.inc.php');
    require_once('db/db.char.createCharacter.inc.php');
    require_once('db/db.user.uidExists.inc.php');

    //check user id isset

    $name = $_POST['name'];
    $class = $_POST['class'];
    $level = $_POST['level'];
    $user_id = $_SESSION['uid'];

    //check all vars isset

    if(emptyInput($user_id, $name, $level, $class))
    {
        header("location: ../createchar.inc.php?err=emptyInput");
        exit();
    }


    if(!uidExists($DB, $user_id))
    {
        header("location: ../createchar.inc.php?err=invalidUserId");
        exit();
    }


    if(invalidName($name))
    {
        header("location: ../createchar.inc.php?err=invalidName");
        exit();
    }


    if(invalidClass($class))
    {
        header("location: ../createchar.inc.php?err=invalidClass");
        exit();
    }


    if(invalidlevel($level))
    {
        header("location: ../createchar.inc.php?err=invalidLevel");
        exit();
    }
    
    $cid = getHashToken($user_id);

    db_char_createCharacter($DB, $cid ,$user_id, $name, $class, $level);

    header("location: ../choosechar.php");
    exit();
}