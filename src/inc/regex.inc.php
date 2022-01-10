<?php

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



