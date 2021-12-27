<?php
    
    function db_user_uidExists($con, $uid){
        $col =  "users";
        $collection = $con->$col;

        $filter = ['uid' => ['$eq' => $uid]];

        $cursor = $collection->find($filter);

        foreach($cursor as $doc){
            return true;
        }

        return false;
    }
?>