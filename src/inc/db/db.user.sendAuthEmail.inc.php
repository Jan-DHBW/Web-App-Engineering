<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function db_user_sendAuthEmail($con, $id, $name, $email, $authHashToken)
{

    $con->users;
    $filter = ['_id' => ['eq' => $id]];


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
    $mail->addAddress($email, $name);
    $mail->Subject = 'DnD Spellbook email authentification';
    $mail->Body = 'Please confirm the following link: <a href="http://'.$_SERVER["SERVER_NAME"].'/auth.php?auth='.$authHashToken.'">'.$_SERVER["SERVER_NAME"].'/auth.php?auth='.$authHashToken.'</a>';

    return $mail->send();
}
