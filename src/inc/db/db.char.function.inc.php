<?php
function db_char_createCharacter($con, $cid, $uid, $name, $class, $level){
    $collection = $con->characters;

    $insertOneResult = $collection->insertOne(
        [   
            'cid' => $cid,
            'uid' => $uid,
            'level' => $level,
            'name' => $name,
            'class' => $class           
        ]);

    if(empty($insertOneResult)){
        return false;
    }

    return $cid;
}


function db_char_deleteChar($con, $cid, $uid)
{
    $collection = $con->characters;

    $filter = ['uid' => ['$eq' => $uid], 'cid' => ['$eq' => $cid]];
}


function db_char_getCharsByUserId($con, $uid)
{
    $result = array();
    $col = "characters";
    $collection = $con->$col;

    $filter = ['uid' => ['$eq' => $uid]];

    $cursor = $collection->find($filter);



    foreach ($cursor as $doc) {
        $elmt = new Character();
        $elmt->cid = $doc['cid'];
        $elmt->uid = $doc['uid'];
        $elmt->name = $doc['name'];
        $elmt->class = $doc['class'];
        $elmt->level = $doc['level'];

        $result[] = $elmt;
    }

    return $result;
}
