<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function emptyInput($name, $email, $emailRepeat, $pwd, $pwdRepeat)
{
    if (empty($name)) return true;
    if (empty($email)) return true;
    if (empty($emailRepeat)) return true;
    if (empty($pwd)) return true;
    if (empty($pwdRepeat)) return true;

    return false;
}

function invalidName($name)
{
    //if(preg_match("/^[a-zA-Z0-9]*$/",$username)) return true;

    return false;
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return true;

    return false;
}

function emailMatch($email, $emailRepeat)
{
    if ($email !== $emailRepeat) return false;

    return true;
}

function emailExists($con, $email)
{
    return db_user_emailExists($con, $email);
}

function pwdMatch($pwd, $pwdRepeat)
{
    if ($pwd !== $pwdRepeat) return false;

    return true;
}

function nameExists($con, $name)
{
    return db_user_nameExists($con, $name);
}

function createUser($con, $name, $email, $pwd)
{   
    $uid = getHashToken($name);
    db_user_createUser($con, $uid, $name, $email, hashPwd($pwd));
    return $uid;
}

function createAuthHashToken($con, $id)
{
    $token = getHashToken((string) $id);

    db_user_createHashTokenAuthEmail($con, $id, $token);

    return $token;
}


function sendEmailAuthEmail($email, $token) 
{   
    $link = 'http://'.$_SERVER["SERVER_NAME"].'/src/authEmail.php?token='.e($token);

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
    $mail->Subject = 'DnD Spellbook email authentification';
    $mail->MsgHTML('<p>Please confirm your email by clicking the following link: <a href="'.$link.'">'.$link.'</a></p>');

    return $mail->send();
}
