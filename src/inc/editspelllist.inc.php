<?php

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    header('location: ../errorPage.php?err=pageNotFound');
    exit();
}

session_start();


//handle remove Spell

if(isset($_POST['btnRemoveSpell'])){
    
    //require dependencies
    
    require_once('db/dbh.inc.php');
    require_once('db/db.char.function.inc.php');
    require_once('db/db.spell.removeSpell.inc.php');
    require_once('hash.inc.php');
    require_once('regex.inc.php');
    
    $uid = sanitizeHashToken($_POST['uid']);     //validate uid
    $cid = sanitizeHashToken($_POST['cid']);    //validate cid
    $spell_id = e($_POST['spell_id']);


    if(!db_char_exists($DB, $uid, $cid)){
        header('location: ../errorPage.php?err=pageNotFound');
        exit();
    }

    unset($_SESSION['btnRemoveSpell']);
    $_SESSION['uid'] = $uid;
    $_SESSION['cid'] = $cid;


    //remove spell from character
    removeSpell($DB, $spell_id, $cid);

    header('location: ../editspelllist.php');
    exit();



}else if(isset($_POST['btnAddSpell'])){
    
    //require dependencies
    
    require_once('db/dbh.inc.php');
    require_once('db/db.char.function.inc.php');
    require_once('db/db.spell.addSpell.inc.php');
    require_once('hash.inc.php');
    require_once('regex.inc.php');
    
    $uid = sanitizeHashToken($_POST['uid']);     //validate uid
    $cid = sanitizeHashToken($_POST['cid']);    //validate cid
    $spell_id = e($_POST['spell_id']);

    if(!db_char_exists($DB, $uid, $cid)){
        header('location: ../errorPage.php?err=pageNotFound');
        exit();
    }

    unset($_SESSION['btnAddSpell']);
    $_SESSION['uid'] = $uid;
    $_SESSION['cid'] = $cid;


    //add spell to character
    addSpell($DB, $spell_id, $cid);

    header('location: ../editspelllist.php');
    exit();
}

header('location: ../errorPage.php?err=pageNotFound');
exit();




