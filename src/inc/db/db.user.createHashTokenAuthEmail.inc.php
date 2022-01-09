<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function db_user_createHashTokenAuthEmail($con, $id, $hashToken)
{

    $collection = $con->users;

    $updateOneResult = $collection->updateOne(
        ['_id' => ['$eq' => new MongoDB\BSON\ObjectId($id)]],
        ['$set' => ['authHashToken' => $hashToken]]
    );
    
}
