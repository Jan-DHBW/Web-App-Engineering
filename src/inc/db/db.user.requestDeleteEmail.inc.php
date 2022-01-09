<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function db_user_requestDeleteEmail($con, $id, $authHashToken)
{

    $collection = $con->users;

    $updateOneResult = $collection->updateOne(
        ['_id' => ['$eq' => new MongoDB\BSON\ObjectId($id)]],
        ['$set' => ['deleteHashToken' => $authHashToken]]
    );
    
}
