<?php

require_once('db\db.spell.class.inc.php');
require_once('db\db.spell.addSpell.inc.php');
require_once('db\db.spell.removeSpell.inc.php');
require_once('db\db.spell.deleteSpell.inc.php');
require_once('db\db.spell.createSpell.inc.php');
require_once('C:\WebEntAbgabe\Web-App-Engineering\vendor\autoload.php');


function createDbConnection(){
    //TODO: SEC ISSUE: plaintext pwd
    $m = new MongoDB\Client("mongodb+srv://root:testPwd!@cluster0.ojodh.mongodb.net/dnd-spellbook?retryWrites=true&w=majority");
    $db = "dnd-spellbook";
    
    return $m->$db;
}

    $DB = createDbConnection();
    $col = "characters";
    $collection = $DB->$col;


    // $result = array();
    // $col = "characters";
    // $collection = $DB->$col;
    // $filter = ['cid' => ['$eq' => 'Drs0OeCBI4uSpuW8mM0gIYbxZuoMabRcUYtahM7gOYI']];
    // $char = $collection->findOne($filter);
    // $tmp = $char['spells'];
    // foreach ($tmp as $spell){
    //     array_push($result, $spell['spell_id']);
    // }
    // if ($result[0] instanceof MongoDB\BSON\ObjectID){
    //     $btset = true;
    // }
    $index='Thunderbolt';
    $name='Thunderbolt';
    $desc='Thunderbolt';
    $range='20 Feet';
    $comp=['V','S'];
    $mater='Strom';
    $ritual=false;
    $duratio='1 turn';
    $concentration=false;
    $lvl=1;
    $cast_time='insatnt';
    $attack_type='ranged';
    $damage='Elektro';
    $school='evocation';
    $area_of_effect=false;
    $creator='s7jgrm6VKUHuDEf8a0XKzeW4A0EBrL424Nuhw0XIs';


    $cid = 's7jgrm6VKUHuDEf8a0XKzeW4A0EBrL424Nuhw0XIs';
    $spellid = '61e42344d0270000bc001a72';

    //$tmp = createSpell($DB,$index,$name,$desc,$range,$comp,$mater,$ritual,$duratio,$concentration,$lvl,$cast_time,$attack_type,$damage,$school,$area_of_effect,$creator);
    //$tmp = $tmp->getInsertedID();    
    deleteSpell($DB,$spellid,$cid);
    //$col = 'characters'
    //$collection = $DB->$col;
    $bspellid = new MongoDB\BSON\ObjectID($spellid);

    $tmpspell = new Spell();
    $col = "spells";
    $collection = $DB->$col;
    if ($spellid instanceof MongoDB\BSON\ObjectID) {
        $bspellid = $spellid;
    } else {
    $bspellid = new MongoDB\BSON\ObjectID($spellid);
    }
    $filter = ['_id' =>  $bspellid];
    $result = $collection->findOne($filter);
    if($resu)
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
    

        printf("sdfa");
    

//     $filter = ['cid' => ['$eq' => 'Drs0OeCBI4uSpuW8mM0gIYbxZuoMabRcUYtahM7gOYI']];
//     $char = $collection->findOne($filter);
//     $j = json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($char['spells'])), true);
//     $t= $j[0]['spell_id'];
//     $parms = array(
//         array(
//             '$match' => array( 
//                 "cid" => 'Drs0OeCBI4uSpuW8mM0gIYbxZuoMabRcUYtahM7gOYI'
//             ) 
//             ),
//         array(
//             '$lookup' => array(
//                 "from" => "spells",
//                 "localField" => 'spells=>',
//                 "foreignField" => '_id',
//                 "as" => "something"
//             )
//         )
//     );
//     $results = $collection->aggregate($parms)->toArray();
//    printf("sdasd");
    


//     $tmpspell = new Spell();
//     $bspellid = new MongoDB\BSON\ObjectID('61db0f91246f56da35983e98');
    
//     $filter = ['_id' =>  $bspellid];
//     $col = "spells";
//     $coll = $DB->$col;
//     $result3 = $coll->findOne($filter);
    

   printf("sdf");

?>