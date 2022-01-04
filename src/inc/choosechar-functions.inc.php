<?php
    
    function showCharacters($con, $user_id){
        $chars = db_char_getCharsByUserId($con, $user_id);
        $elmtCnt = 0;

        foreach($chars as $elmt){
            echo '<tr>';
            echo '<th scope="row">';
            echo $elmtCnt;
            echo '</th>';
            echo '<td><img src="https://cdn.animenachrichten.de/wp-content/uploads/2019/05/Demon-Slayer-Kimetsu-no-Yaiba-07.jpg" alt="" border=3 height=100 width=150></img></td>';
            echo "<td>{$elmt->name}</td>";
            echo "<td>{$elmt->class}</td>";
            echo "<td>{$elmt->level}</td>";
            echo '<td>very very fresh</td>';
            echo '</tr>';
            $elmtCnt++;
        }
    }
?>