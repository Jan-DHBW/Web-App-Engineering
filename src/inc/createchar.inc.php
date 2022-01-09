<?php


if(isset($_POST['btnSubNewChar'])){
    session_start();

    //required dependencies
    require_once('createchar-functions.inc.php');
    require_once('hash.inc.php');
    require_once('db/dbh.inc.php');
    require_once('db/db.char.createCharacter.inc.php');
    require_once('db/db.user.oIDExists.inc.php');

    //check user id isset

    $name = $_POST['name'];
    $class = $_POST['class'];
    $level = $_POST['level'];
    $oID = $_SESSION['current_user_id'];

    //check all vars isset

    if(emptyInput($oID, $name, $level, $class))
    {
        header("location: ../createchar.inc.php?err=emptyInput");
        exit();
    }


    if(invalidUserId($DB, $oID))
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

    db_char_createCharacter($DB, $oID, $name, $class, $level);

    header("location: ../choosechar.php");
    exit();
}