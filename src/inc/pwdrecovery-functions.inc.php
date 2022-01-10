<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


function emailExists($con, $email){
    return db_user_emailExists($con, $email);
}

function createResetHashToken($con, $email){
    $hashToken = getHashToken($email);

    db_user_createHashTokenResetPwd($con, $email, $hashToken);

    return $hashToken;
}

function sendEmailResetPwd($email, $hashToken)
{

    $link = 'http://'.$_SERVER["SERVER_NAME"].'/src/authResetPwd.php?token='.e($hashToken);

    $mail = new PHPMailer(true);

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "tls"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 587; // set the SMTP port for the GMAIL server
    $mail->Username = "my.dnd.spellbook@gmail.com"; // GMAIL username
    $mail->Password = "29!20BWHdmQS_p"; // GMAIL password

    $mail->setFrom("my.dnd.spellbook@gmail.com", "dnd spellbook");

    $mail->addAddress($email, ''); 
    $mail->Subject = 'DnD Spellbook reset password';
    $mail->MsgHTML('<p>Reset your password by clicking the following Link: <a href="'.$link.'">'.$link.'</a></p>');

    return $mail->send();
}