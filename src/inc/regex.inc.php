<?php


function sanitizeHashToken($token){
    $token = str_replace(' ', '', $token);
    $token = preg_replace('/[^A-Za-z0-9\-]/','', $token);

    return $token;
}


function sanitize($text){
    return preg_replace('/[^A-Za-z0-9\-]/','', $text);
}


function sanitizeEmail($email){
    return filter_var($email, FILTER_SANITIZE_EMAIL);
}


function sanitizeCharacterName($name){
    $sanitizedName = preg_replace('/[^A-Za-z0-9\040\-]/', '', $name);
    return preg_replace('/\G\s|\s(?=\s*$)/', '', $sanitizedName);
}


function sanitizeCharacterClass($class){
    //TODO: remove leading special chars '-' and ':'
    return preg_replace('/[^a-zA-Z\s:-]+/', '', $class);
}


function sanitizeCharacterLevel($level){
    return preg_replace('/[^0-9]/', '', $level);
}



function invalidCharacterName($name){
    return !preg_match('/^[a-z0-9\040\.\-]+$/i', $name);
}


function invalidCharacterClass($class){
    return preg_match('/[^a-zA-Z\s:-]+/', $class);
}


function invalidCharacterLevel($level){
    if(!preg_match('/^[0-9]/', $level))  return true;
    if($level > 20) return true;    

    return false;
}



