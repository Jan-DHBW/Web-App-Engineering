<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function db_user_createHashTokenResetPwd($con, $email, $hashToken)
{

    $collection = $con->users;

    $updateOneResult = $collection->updateOne(
        ['email' => ['$eq' => $email]],
        ['$set' => ['resetHashToken' => $hashToken]]
    );
    
    //return false if no rows matched or updated
}
