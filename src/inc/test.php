<?php

require_once('db\db.spell.class.inc.php');
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


    $result = array();
    $col = "characters";
    $collection = $DB->$col;
    $filter = ['cid' => ['$eq' => 'Drs0OeCBI4uSpuW8mM0gIYbxZuoMabRcUYtahM7gOYI']];
    $char = $collection->findOne($filter);
    $tmp = $char['spells'];
    foreach ($tmp as $spell){
        array_push($result, $spell['spell_id']);
    }



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