<?php

if (isset($_GET['token'])) {
    //requirements
    require_once("inc/head.inc.php");
    require_once("inc/db/dbh.inc.php");
    require_once("inc/db/db.user.isValidHashTokenResetPwd.inc.php");
    require_once("inc/regex.inc.php");


    //sanatize parameter
    $token = sanitizeHashToken($_GET['token']);

    //check token valid
    if (!isTokenValid($DB, $token)) {
        header('location: errorPage.php?err=pageNotFound');
        exit();
    }

    echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<link rel="stylesheet" href="../../css/style_authresetpw.css">';
        echo '<title>D&D Spellbook</title>';
    echo '</head>';

    echo '<body>';

        echo '<form action ="inc/resetPwd.inc.php" method="post">';
            echo '<img id="main-bg-img" src="../../img/mythicTome.png">';

            echo '<div class ="resetPwd-form">';
                echo '<div>';
                    echo '<h1 style="font-size: larger;"><strong>Password Recovery</strong></h2>';
                    echo '<label for="pwd"><b>New Password</b></label>';
                    echo '<input type="password" placeholder="Enter Password" name="pwd" required>';
                    echo '<label for="pwdRepeat"><b>Repeat Password</b></label>';
                    echo '<input type="password" placeholder="Repeat Password" name="pwdRepeat" required>';
                    echo '<input type="hidden" name="token" value="' . e($token) . '" required>';
                    echo '<button class="submit" name="resetpwd" type="submit" value="true">Save New Password</button>';
                    echo '<div id="err"></div>';
                echo '</div>';
            echo '</div>';
        echo '</form>';
        
    echo '</body>';

    //redirect to other site
} else {
    header('location: errorPage.php?err=pageNotFound');
    exit();
}

function isTokenValid($con, $token)
{
    return db_user_isValidHashTokenResetPwd($con, $token);
}
