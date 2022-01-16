<?php

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    header('location: ../errorPage.php?err=pageNotFound');
    exit();
}

session_start();


//handle show Spells

if(isset($_POST['btnEditSpellList'])){
    
    //require dependencies
    
    require_once('db/dbh.inc.php');
    require_once('db/db.char.function.inc.php');
    require_once('hash.inc.php');
    require_once('regex.inc.php');
    
    $uid = sanitizeHashToken($_POST['uid']);     //validate uid
    $cid = sanitizeHashToken($_POST['cid']);    //validate cid


    if(!db_char_exists($DB, $uid, $cid)){
        header('location: ../errorPage.php?err=pageNotFound');
        exit();
    }

    unset($_SESSION['btnEditSpelList']);
    $_SESSION['uid'] = $uid;
    $_SESSION['cid'] = $cid;

    header('location: ../editspelllist.php');
    exit();


}else if(isset($_POST['btnPrepareSpell'])){

    require_once('db/dbh.inc.php');
    require_once('db/db.char.function.inc.php');
    require_once('db/db.spell.prepareSpell.inc.php');
    require_once('hash.inc.php');
    require_once('regex.inc.php');
    
    $uid = sanitizeHashToken($_POST['uid']);     //validate uid
    $cid = sanitizeHashToken($_POST['cid']);    //validate cid
    $spell_id = e($POST['spell_id']);


    if(!db_char_exists($DB, $uid, $cid)){
        header('location: ../errorPage.php?err=pageNotFound');
        exit();
    }

    unset($_SESSION['btnEditSpelList']);
    $_SESSION['uid'] = $uid;
    $_SESSION['cid'] = $cid;


    //prepare spell
    prepareSpell($DB, $spell_id, $cid);


    header('location: ../editspelllist.php');
    exit();


}else if(isset($_POST['btnUnrepareSpell'])){

    require_once('db/dbh.inc.php');
    require_once('db/db.char.function.inc.php');
    require_once('db/db.spell.prepareSpell.inc.php');
    require_once('hash.inc.php');
    require_once('regex.inc.php');
    
    $uid = sanitizeHashToken($_POST['uid']);     //validate uid
    $cid = sanitizeHashToken($_POST['cid']);    //validate cid
    $spell_id = e($POST['spell_id']);


    if(!db_char_exists($DB, $uid, $cid)){
        header('location: ../errorPage.php?err=pageNotFound');
        exit();
    }

    unset($_SESSION['btnEditSpelList']);
    $_SESSION['uid'] = $uid;
    $_SESSION['cid'] = $cid;

    //unprepare spell
    unprepareSpell($DB, $spell_id, $cid);

    
    header('location: ../editspelllist.php');
    exit();


}


header('location: ../errorPage.php?err=pageNotFound');
exit();