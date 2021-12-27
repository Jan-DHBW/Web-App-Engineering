<?php
    
    function db_user_emailExists($con, $email){
        $col =  "users";
        $collection = $con->$col;

        $filter = ['email' => ['$eq' => $email]];

        $cursor = $collection->find($filter);

        foreach($cursor as $doc){
            return true;
        }

        return false;
    }
?>