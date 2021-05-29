<?php

class SessionLogin {

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
        }
        else {
            throw new Exception("Ce nom d'utilisateur n'existe pas.");
        }  
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function playerExist($username)
    {
        try
        {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('SELECT COUNT(*) FROM player WHERE username = ?');
            $requete->execute(array(
                $username
            ));
            $donnees = $requete->fetch();
            return (($donnees[0]));
        }
        catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public function loginToAccount()
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('SELECT username, playerId, pass FROM player WHERE username = ?');
            $requete->execute(array(
                $this->getUsername()
            ));
            $donnees = $requete->fetch();
            if (password_verify($this->getPassword(), $donnees['pass']))
            {
                $_SESSION['username'] = $donnees['username'];
                $_SESSION['playerId'] = $donnees['playerId'];
            }
            else
            {
                throw new Exception("Le couple identifiant / mot-de-passe est incorrecte.");
            }
        }
        catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

}