<?php

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    header('location: ../choosechar.php');
    exit();
}

if(isset($_POST['btnShowSpells'])){
    exit();
}


if(isset($_POST['btnEditCharacter'])){
    exit();
}


if(isset($_POST['btnDeleteCharacter'])){
    exit();
}