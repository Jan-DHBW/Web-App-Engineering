<?php
function db_char_createChar($con, $name, $user_id, $class, $level)
{
    $col = "characters";
    $collection = $con->$col;

    $newChar = array(
        "name" => $name,
        "user_id" => $user_id,
        "level" => $level,
        "class" => $class


    );
    $collection->insertOne($newChar);
}

function db_char_deleteChar($con, $char_id, $user_id)
{
    $col = "characters";
    $collection = $con->$col;



    $filter = ['user_id' => ['$eq' => $user_id], '_id' => ['$eq' => $char_id]];
}


function db_char_getCharsByUserId($con, $user_id)
{
    $result = array();
    $col = "characters";
    $collection = $con->$col;

    $filter = ['user_id' => ['$eq' => $user_id]];

    $cursor = $collection->find($filter);



    foreach ($cursor as $doc) {
        $elmt = new Character();
        $elmt->_id = (string) $doc['_id'];
        $elmt->name = $doc['name'];
        $elmt->level = $doc['level'];
        $elmt->user_id = $doc['user_id'];

        $result[] = $elmt;
    }

    return $result;
}
