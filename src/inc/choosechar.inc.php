<?php

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    header('location: ../choosechar.php');
    exit();
}

session_start();


//handle show Spells

if(isset($_POST['btnShowSpells'])){
    
    //require dependencies
    
    require_once('db/dbh.inc.php');
    require_once('db/db.char.function.inc.php');
    require_once('hash.inc.php');
    require_once('regex.inc.php');
    
    $uid = sanitizeHashToken($_POST['uid']);     //validate uid
    $cid = sanitizeHashToken($_POST['cid']);    //validate cid


    if(strcmp($uid, $_SESSION['uid']) != 0){
        header('location: ../errorPage.php?err=pageNotFound');
        exit();
    }

    unset($_SESSION['btnShowSpells']);
    $_SESSION['cid'] = $cid;

    header('location: ../charspelllist.php');
    exit();
}



//handler edic character

if(isset($_POST['btnEditCharacter'])){

    //require dependencies

    require_once('db/dbh.inc.php');
    require_once('db/db.char.function.inc.php');
    require_once('hash.inc.php');
    require_once('regex.inc.php');
    

    $uid = sanitizeHashToken($_POST['uid']);     //validate uid
    $cid = sanitizeHashToken($_POST['cid']);    //validate cid
    $name = sanitizeCharacterName($_POST['name']);    //validate name
    $class = sanitizeCharacterClass($_POST['class']);    //validate class
    $level = sanitizeCharacterLevel($_POST['level']);    //validate level


    if(strcmp($uid, $_SESSION['uid']) != 0){
        header('location: errorPage.php?err=pageNotFound');
        exit();
    }

    unset($_SESSION['btnEditCharacter']);

    $_SESSION['cid'] = $cid;
    $_SESSION['name'] = $name;
    $_SESSION['class'] = $class;
    $_SESSION['level'] = $level;


    header('location: ../editchar.php');
    exit();
}


//handler delete character

if(isset($_POST['btnDeleteCharacter'])){

    //require dependencies

    require_once('db/dbh.inc.php');
    require_once('db/db.char.function.inc.php');
    require_once('hash.inc.php');
    require_once('regex.inc.php');
    
    $uid = sanitizeHashToken($_POST['uid']);     //validate uid
    $cid = sanitizeHashToken($_POST['cid']);    //validate cid


    if(strcmp($uid, $_SESSION['uid']) != 0){
        header('location: errorPage.php?err=pageNotFound');
        exit();
    }

    unset($_SESSION['btnDeleteCharacter']);

    //idea: 
    //to ensure the php sites are called in the rigth order and not via url
    //a hash token could be created on each site and validated 

    db_char_deleteCharcter($DB, $uid, $cid);    //delete only the character


    header('location: ../choosechar.php?msg=charDeleted');
    exit();
}

