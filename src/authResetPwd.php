<?php

if(isset($_GET['token'])){
    //requirements
    require_once("inc/head.inc.php");

    //sanatize parameter
    $token = $_GET['token'];

    //TODO: check token valid
    //TODO: check toke expired
    if(isTokenValid($token) === false){
        
        exit();
    }

    echo '<section class ="resetPwd-form">';
    echo '<h2>Sign Up</h2>';
    echo '<form action ="inc/resetPwd.inc.php" method ="post">';
    echo '<label for="pwd"><b>New Password</b></label>';
    echo '<input type="password" placeholder="Enter Password" name="pwd" required>';
    echo '<label for="pwdRepeat"><b>Repeat Password</b></label>';
    echo '<input type="password" placeholder="Repeat Password" name="pwdRepeat" required>';
    echo '<input type="hidden" name="token" value="'.$token.'" required>';
    echo '<button name="resetpwd" type="submit" value="true">Save New Password</button>';
    echo '<div id="err"></div>';
    echo '</form>';

    //redirect to other site
}

function isTokenValid(){

}