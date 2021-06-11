<?php

namespace App;

use Exception as Exception;
use Throwable as Throwable;

class SessionLogin
{

    private $username;
    private $password;
    private $bdd;

    public function getUsername()
    {
        return $this->username;
    }

    public function setBdd($bdd)
    {
        $this->bdd = $bdd;
    }

    private function getBdd()
    {
        return $this->bdd;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUsername($username)
    {
        if ($this->playerExist($username)) {
            $this->username = $username;
        } else {
            throw new Exception("Ce nom d'utilisateur n'existe pas.");
        }
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function playerExist($username)
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('SELECT COUNT(*) FROM player WHERE username = ?');
            $requete->execute(array(
                $username
            ));
            $donnees = $requete->fetch();
            return (($donnees[0]));
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function loginToAccount()
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('SELECT playerId, username, pass, createdAccount, isAdmin, icon, pays, email
            FROM player WHERE username = ?');
            $requete->execute(array(
                $this->getUsername()
            ));
            $donnees = $requete->fetch();
            if (password_verify($this->getPassword(), $donnees['pass'])) {
                $_SESSION['playerId'] = $donnees['playerId'];
                $_SESSION['username'] = $donnees['username'];
                $_SESSION['createdAccount'] = $donnees['createdAccount'];
                $_SESSION['isAdmin'] = $donnees['isAdmin'];
                $_SESSION['icon'] = $donnees['icon'];
                $_SESSION['country'] = $donnees['pays'];
                $_SESSION['email'] = $donnees['email'];
                $this->logLogin($donnees['playerId'], date("Y-m-d H:i:s"));
                $this->setPlayerConnected($donnees['playerId']);
                $this->setLastActivity($donnees['playerId']);
            } else {
                throw new Exception("Le couple identifiant / mot-de-passe est incorrecte.");
            }
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function logLogin($playerId, $date)
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('
            INSERT INTO log__login(playerId, dateLogin, ip)
            VALUES(:playerId, :dateLogin, :ip)');
            $requete->execute(array(
                'playerId' => $playerId,
                'dateLogin' => $date,
                'ip' => $_SERVER['REMOTE_ADDR']
            ));
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function setPlayerConnected($playerId)
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('UPDATE player SET isConnected = 1 WHERE playerId = ?');
            $requete->execute(array(
                $playerId
            ));
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function setLastActivity($playerId)
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('UPDATE player SET lastActivity = :lastActivity WHERE playerId = :playerId');
            $requete->execute(array(
                'playerId' => $playerId,
                'lastActivity' => date("Y-m-d H:i:s")
            ));
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
