<?php

try {

    $requete = $dbh->query("SELECT COUNT(*) FROM player");
    $nbRows = $requete->fetch()[0];

    $requete = $dbh->query("SELECT username, createdAccount, isAdmin, lastActivity FROM player ORDER BY lastActivity DESC LIMIT $printLimitFrom,$printLimitTo");

    $i = $printLimitFrom + 1;

?>

    <div id="arrows">
        <?php
        $lastPage = ceil($nbRows / 20);
        if ($page > 1) {
            echo '<a href="members" title="Première page">&#8606;</a>';
        } else {
            echo '<a href="#">&#8606;</a>';
        }
        if ($page > 1) {
            echo '<a href="members-' . ($page - 1) . '" title="Page précédente">&#8592;</a>';
        } else {
            echo '<a href="#">&#8592;</a>';
        }
        if ($page < $lastPage) {
            echo '<a href="members-' . ($page + 1) . '" title="Page suivante">&#8594;</a>';
        } else {
            echo '<a href="#">&#8594;</a>';
        }
        if ($page < $lastPage) {
            echo '<a href="members-' . ($lastPage) . '" title="Dernière page">&#8608;</a>';
        } else {
            echo '<a href="#">&#8608;</a>';
        }
        ?>
    </div>

    <table id="members">
        <tr class="TableTitle">
            <th>#</th>
            <th>Nom d'utilisateur</th>
            <th>Date d'enregistrement</th>
            <th>En ligne</th>
        </tr>

    <?php
    while ($donnees = $requete->fetch()) {
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
        } else {
            echo '<td><div class="point offline" title="Actuellement hors ligne"></div></td>';
        }

        echo '</tr>';
        $i++;
    }
    $requete = null;
    if ($i == $printLimitFrom + 1) {
        throw new Exception("Aucun enregistrement");
    }
} catch (Throwable $ex) {
    echo '<tr class=\'row' . $i . '\'>';
    echo "<td></td><td>Aucun utilisateur trouvé</td><td></td><td></td></tr>";
}

    ?>
    </table>