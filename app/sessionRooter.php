<?php

namespace App;

use Exception as Exception;

class SessionRooter
{

    private $username;
    private $createdAccount;
    private $lastLogin;
    private $isConnected;
    private $isAdmin;

    public function destroy()
    {
        session_destroy();
    }
    /**
     * Retourne une liste d'amis
     *
     * @param [PDO] $dbh Base de donnée globale
     * @param [Int] $playerId ID du joueur
     * @return array Liste d'amis du joueur sous la forme playerId = username
     */
    public function getListeAmis($dbh, int $playerId) : array
    {
        $listeAmis = array();
        $requete = $dbh->prepare('
        SELECT player.username, player.playerId, player.icon, playerconnected.connecte
        FROM player INNER JOIN friends ON friends.playerId2 = player.playerId
        INNER JOIN playerconnected ON player.playerId = playerconnected.playerId
        WHERE friends.playerId1 = ?');
        $requete->execute(array(
            $playerId
        ));
        while ($donnees = $requete->fetch()) {
            $listeAmis[$donnees['playerId']][0] = $donnees['username'];
            
            if (empty($donnees['icon'])) {
                $listeAmis[$donnees['playerId']][1] = 'http://puissance4/Model/images/pion_bleu.png';
            } else {
                $listeAmis[$donnees['playerId']][1] = $donnees['icon'];
            }
            $listeAmis[$donnees['playerId']][2] = $donnees['connecte'];
        }
        $requete = null;
        return $listeAmis;
    }

    public function getCreatedAccount($dbh, int $playerId) : string
    {
        try {
            setlocale(LC_ALL, 'fr_FR');
            $requete = $dbh->prepare('SELECT createdAccount FROM player WHERE playerId = ?');
            $requete->execute(array(
                $playerId
            ));
            return strftime('%e %h %Y', strtotime($requete->fetch()[0]));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    public function setActivity($dbh, $playerId)
    {
        $requete = $dbh->prepare('UPDATE player SET lastActivity = :lastActivity WHERE playerId = :playerId');
        $requete->execute(array(
            'playerId' => $playerId,
            'lastActivity' => date("Y-m-d H:i:s")
        ));
    }
}
