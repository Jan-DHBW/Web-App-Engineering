<?php


require_once("\dbh.inc.php");
require_once("\db.spell.class.inc.php");


function getSpell($spellid){
    $tmpspell = new Spell();
    $col = "spells";
    $collection = $DB->$col;
    if ($spellid instanceof MongoDB\BSON\ObjectID) {
        $bspellid = $spellid;
    } else {
    $bspellid = new MongoDB\BSON\ObjectID($spellid);
    }
    $filter = ['_id' =>  $bspellid];
    $result = $collection->find($filter);
    $j = json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($result)), true);

    $tmpspell->_id = isset($j['_id']) ? $j['_id']['$oid'] : null;
    $tmpspell->index = isset($j['index']) ? $j['index'] : null;
    $tmpspell->name = isset($j['name']) ? $j['name'] : null;
    $tmpspell->desc = isset($j['desc']) ? implode(' ', $j['desc']) : null;
    $tmpspell->range = isset($j['range']) ? $j['range'] : null;
    $tmpspell->components = isset($j['components']) ? implode(', ',$j['components']) : null;
    $tmpspell->material = isset($j['material']) ? $j['material'] : null;
    $tmpspell->ritual = isset($j['ritual']) ? $j['ritual'] : null;
    $tmpspell->duration = isset($j['duration']) ? $j['duration'] : null;
    $tmpspell->concentration = isset($j['concentration']) ? $j['concentration'] : null;
    $tmpspell->level = isset($j['level']) ? $j['level'] : null;
    $tmpspell->attack_type = isset($j['attack_type']) ? $j['attack_type'] : null;
    $tmpspell->school = isset($j['school']) ? $j['school']['name'] : null;
    $tmpspell->area_of_effect = isset($j['area_of_effect']) ? implode(', ', $j['area_of_effect']) : null;
    



    return $tmpspell
}


?>