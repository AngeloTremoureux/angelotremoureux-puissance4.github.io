<table id="members">
    <tr class="TableTitle">
        <th>#</th>
        <th>Nom d'utilisateur</th>
        <th>Date d'enregistrement</th>
        <th>En ligne</th>
    </tr>

<?php

$requete = $dbh->query('SELECT username, createdAccount, isAdmin, isConnected FROM player');
$i = 1;
while ($donnees = $requete->fetch())
{
    echo '<tr class=\'row' . $i . '\'>';
    echo "<td><b>$i</b></td>";
    if ($donnees['isAdmin']) {
        echo '<td><div class="group-admin">' . $donnees['username'] . '</div></td>';
    } else {
        echo '<td>' . $donnees['username'] . '</td>';
    }
    echo '<td>' . date('d\/m\/Y \à H\hi', strtotime($donnees['createdAccount'])) . '</td>';
    if ($donnees['isConnected']) {
        echo '<td><div class="point online" title="Actuellement en ligne"></div></td>'; 
    }
    else {
        echo '<td><div class="point offline" title="Actuellement hors ligne"></div></td>'; 
    }
    
    echo '</tr>';
    $i++;
}
?>
</table>