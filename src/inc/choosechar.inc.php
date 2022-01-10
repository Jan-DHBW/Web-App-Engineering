<?php

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    header('location: ../choosechar.php');
    exit();
}

session_start();

if(isset($_POST['btnShowSpells'])){
    //validate uid
    //validate cid
    exit();
}


if(isset($_POST['btnEditCharacter'])){
    //validate uid
    //validate cid
    exit();
}


if(isset($_POST['btnDeleteCharacter'])){

    //require dependencies

    require_once('db/dbh.inc.php');
    require_once('db/db.char.function.inc.php');
    require_once('hash.inc.php');
    
    $uid = sanitizeHashToken($_POST['uid']);     //validate uid
    $cid = sanitizeHashToken($_POST['cid']);    //validate cid


    if(strcmp($uid, $_SESSION['uid']) != 0){
        header('location: ../errorPage.php?err=pageNotFound');
        exit();
    }


    db_char_deleteCharcter($DB, $uid, $cid);    //delete only the character


    header('location: ../choosechar.php?msg=charDeleted');
    exit();
}