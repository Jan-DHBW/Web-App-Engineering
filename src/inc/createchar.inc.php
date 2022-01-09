<?php


if(isset($_POST['btnSubNewChar'])){

    //required dependencies
    require_once('createchar-functions.inc.php');
    require_once('db/dbh.inc.php');

    //check user id isset

    $name = sanatize($_POST['name']);
    $class = sanatize($_POST['class']);
    $level = sanatize($_POST['level']);
    $user_id = sanatize($_SESSION['current_user_id']);

    //check all vars isset

    //check user id exists


    
    

}