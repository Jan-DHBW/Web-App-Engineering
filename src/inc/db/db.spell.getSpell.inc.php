<?php


require_once("\dbh.inc.php");
require_once("\db.spell.class.inc.php");


function getSpell($spellid){
    $tmpspell = new Spell();
    $col = "spells";
    $collection = $DB->$col;
    $bspellid = new MongoDB\BSON\ObjectID($spellid);
    $filter = ['_id' =>  $bspellid];
    $result = $collection->find($filter);
    $j = json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($result)), true);

    $spell->_id = isset($j['_id']) ? $j['_id']['$oid'] : null;
    $spell->index = isset($j['index']) ? $j['index'] : null;
    $spell->name = isset($j['name']) ? $j['name'] : null;
    $spell->desc = isset($j['desc']) ? implode(' ', $j['desc']) : null;
    $spell->range = isset($j['range']) ? $j['range'] : null;
    $spell->components = isset($j['components']) ? implode(', ',$j['components']) : null;
    $spell->material = isset($j['material']) ? $j['material'] : null;
    $spell->ritual = isset($j['ritual']) ? $j['ritual'] : null;
    $spell->duration = isset($j['duration']) ? $j['duration'] : null;
    $spell->concentration = isset($j['concentration']) ? $j['concentration'] : null;
    $spell->level = isset($j['level']) ? $j['level'] : null;
    $spell->attack_type = isset($j['attack_type']) ? $j['attack_type'] : null;
    $spell->school = isset($j['school']) ? $j['school']['name'] : null;
    $spell->area_of_effect = isset($j['area_of_effect']) ? implode(', ', $j['area_of_effect']) : null;
    



    return $tmpspell
}


?>