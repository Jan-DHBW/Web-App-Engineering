<?php
    
    function showCharacters($con, $uid){
        $chars = db_char_getCharsByUserId($con, $uid);
        $elmtCnt = 0;

        foreach($chars as $elmt){
            echo '<tr>';
            echo '<th scope="row">';
            echo $elmtCnt;
            echo '</th>';
            //echo '<td><img src="https://cdn.animenachrichten.de/wp-content/uploads/2019/05/Demon-Slayer-Kimetsu-no-Yaiba-07.jpg" alt="" border=3 height=100 width=150></img></td>';
            echo "<td>{$elmt->name}</td>";
            echo "<td>{$elmt->class}</td>";
            echo "<td>{$elmt->level}</td>";
            echo "<td>";
            echo '<input type="hidden" name="cid" value="'.$elmt->cid.'">';
            echo '<input type="hidden" name="user_id" value="'.$elmt->user_id.'">';
            echo "<button type='buton' class='btn btn-primary' name='btnNewCharacter'>Show Spells</button>";
            echo "<button type='buton' class='btn btn-primary' name='btnNewCharacter'>Edit</button>";
            echo "<button type='buton' class='btn btn-primary' name='btnNewCharacter'>Delete</button>";
            echo "</td>";
            //echo "<td><button name='rowID' type='submit' value='{$elmtCnt}' formaction='choosechar.inc.php'>Show Spells</button></td>";
            echo '</tr>';
            $elmtCnt++;
        }
    }
?>