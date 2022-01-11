<?php



if($_SERVER['REQUEST_METHOD'] == "GET"){
    header("location: ../errorPage.php?err=pageNotFound");
    exit();
}


if(isset($_POST['btnSubEditChar'])){
    session_start();


    //required dependencies
    
    require_once('db/dbh.inc.php');
    require_once('db/db.char.function.inc.php');
    require_once('editchar-functions.inc.php');
    require_once('hash.inc.php');
    require_once('regex.inc.php');

    //sanitize user input
    
    $uid = sanitizeHashToken($_SESSION['uid']);
    $cid = sanitizeHashToken($_SESSION['cid']);


    $name = $_POST['name'];
    $class = $_POST['class'];
    $level = $_POST['level'];


    //unset session vars

    unset($_SESSION['cid']);
    unset($_SESSION['name']);
    unset($_SESSION['class']);
    unset($_SESSION['level']);

    //uid is valid

    //user exists
    //character exists


    //validate user input

    if(invalidCharacterName($name))
    {
        header("location: ../editchar.php?err=invalidName");
        exit();
    }


    if(invalidCharacterClass($class))
    {
        header("location: ../editchar.php?err=invalidClass");
        exit();
    }


    if(invalidCharacterLevel($level))
    {
        header("location: ../editchar.php?err=invalidLevel");
        exit();
    }


    //update character

    db_char_updateCharacter($DB, $uid, $cid, $name, $class, $level);

    header("location: ../choosechar.php?msg=charEdited");
    exit();
}

header("location: ../errorPage.php?err=pageNotFound");
exit();
