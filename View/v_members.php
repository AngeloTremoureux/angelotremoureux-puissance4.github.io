<table id="members">
    <tr class="TableTitle">
        <th>#</th>
        <th>Nom d'utilisateur</th>
        <th>Date d'enregistrement</th>
        <th>En ligne</th>
    </tr>

<?php

try {
    $requete = $dbh->query('SELECT username, createdAccount, isAdmin, lastActivity FROM player ORDER BY lastActivity DESC LIMIT 0,20');
    $i = 1;
    if (PDO::MYSQL_ATTR_FOUND_ROWS <= 0) { throw new Exception("Aucun utilisateur"); }
    while ($donnees = $requete->fetch())
    {
        echo '<tr class=\'row' . $i . '\'>';
        echo "<td><b>$i</b></td>\n";
        if ($donnees['isAdmin']) {
            echo '<td><div class="group-admin usrtooltip">' . $donnees['username'] . '<span class="tooltipcontent"><p class="username">' . $donnees['username'] . '</p><br/><p class="rank">Rang: <span>Administrateur</span></p></span></div></td>';
        } else {
            echo '<td><div class="usrtooltip">' . $donnees['username'] . '<span class="tooltipcontent"><p class="username">' . $donnees['username'] . '</p><br/><p class="rank">Rang: <span>Joueur</span></p></span></div></td>';
        }
        echo '<td>' . date('d\/m\/Y \à H\hi', strtotime($donnees['createdAccount'])) . '</td>';
        if (strtotime(date("Y-m-d H:i:s")) - strtotime($donnees['lastActivity']) <= 300) {
            echo '<td><div class="point online" title="Actuellement en ligne"></div></td>'; 
        }
        else {
            echo '<td><div class="point offline" title="Actuellement hors ligne"></div></td>'; 
        }
        
        echo '</tr>';
        $i++;
    }
}
catch (Throwable $ex)
{ 
    echo '<tr class=\'row' . $i . '\'>';
    echo "<td></td><td>Aucun utilisateur trouvé</td><td></td><td></td></tr>";
}
?>

</table>