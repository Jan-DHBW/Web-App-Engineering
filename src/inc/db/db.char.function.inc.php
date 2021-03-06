<?php

require_once("db.spell.class.inc.php");
require_once("db.spell.getSpell.inc.php");

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


function db_char_deleteCharcter($con, $uid, $cid)
{
    $collection = $con->characters;

    $deleteOneResult = $collection->deleteOne(
        [
            'uid' => ['$eq' => $uid], 
            'cid' => ['$eq' => $cid]
        ]
    );

    return $deleteOneResult;
}

function db_char_getSpells($con,$char_id) {
    $result = array();
    $spelllist = array();
    $col = "characters";
    $collection = $con->$col;
    $filter = ['cid' => ['$eq' => $char_id]];
    $char = $collection->findOne($filter);
    $spells = $char['spells'];
    $tmpspell;
    foreach($spells as $spell){

        $tmpspell = getSpell($con, $spell['spell_id']);
        $tmpspell->prepared = $spell->prepared;
        array_push($result, $tmpspell);
    }
    


    return $result;
};

function db_char_getEditSpellList($con,$uid,$cid){
    $allSpells = db_spell_getAllSpells($con,$uid);
    $knownSpells = db_char_getSpells($con,$cid);
    $diff = array_diff($allSpells,$knownSpells);
    $diff2 = array_intersect($allSpells,$knownSpells);
    foreach ($diff2 as $entry) {
        $entry->cid = $cid;
    }

    
    return array_merge($diff2,$diff);

};


function db_char_getCharactersByUID($con, $uid)
{
    $result = array();
    $col = "characters";
    $collection = $con->$col;

    $cursor = $collection->find(
        ['uid' => ['$eq' => $uid]],
        [
            '_id' => 0,
            'cid' => 1,
            'uid' => 1,
            'name' => 1,
            'class' => 1,
            'level' => 1
        ]
    );



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


function db_char_updateCharacter($con, $uid, $cid, $name, $class, $level){
    $collection = $con->characters;

    $updateOneResult = $collection->updateOne(
        ['uid'=> ['$eq' => $uid], 'cid' => ['$eq' => $cid]],                        
        ['$set' =>['name' => $name, 'class' => $class, 'level' => $level]]
    );

    if(!isset($updateOneResult)){
        return false;
    }

    return true;
}


function db_char_exists($con, $uid, $cid)
{
    $collection = $con->characters;

    $findOneResult = $collection->findOne(
        [
            'uid' => ['$eq' => $uid],
            'cid' => ['$eq' => $cid]
        ]);

    if(empty($findOneResult)) {
        return false;
    }

    return true;
}

function db_char_getCharacternameByCID($con, $uid, $cid){
    $collection = $con->characters;

    $findOneResult = $collection->findOne(
        [
            'uid' => ['$eq' => $uid],
            'cid' => ['$eq' => $cid]
        ]);

    return (string) $findOneResult->name;
}