<?php

if(isset($_GET['token'])){
    //requirements
    require_once("inc/head.inc.php");
    require_once("inc/db/dbh.inc.php");
    require_once("inc/db/db.user.isValidHashTokenResetPwd.inc.php");
    require_once("inc/regex.inc.php");


    //sanatize parameter
    $token = sanitizeHashToken($_GET['token']);

    //check token valid
    //TODO: check toke expired
    if(isTokenValid($DB, $token) === false){
        header('location: errorPage.php?err=pageNotFound');
        exit();
    }

    echo '<section class ="resetPwd-form">';
    echo '<h2>Password Recovery</h2>';
    echo '<form action ="inc/resetPwd.inc.php" method="post">';
    echo '<label for="pwd"><b>New Password</b></label>';
    echo '<input type="password" placeholder="Enter Password" name="pwd" required>';
    echo '<label for="pwdRepeat"><b>Repeat Password</b></label>';
    echo '<input type="password" placeholder="Repeat Password" name="pwdRepeat" required>';
    echo '<input type="hidden" name="token" value="'.e($token).'" required>';
    echo '<button name="resetpwd" type="submit" value="true">Save New Password</button>';
    echo '<div id="err"></div>';
    echo '</form>';

    //redirect to other site
}else{
    header('location: errorPage.php?err=pageNotFound');
    exit();
}


function isTokenValid($con, $token){
    return db_user_isValidHashTokenResetPwd($con, $token);
}
