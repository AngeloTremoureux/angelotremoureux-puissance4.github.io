<?php

class SessionRegister {

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

    private function getHashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT); 
    }

    public function setUsername($username)
    {
        $pattern = "~([a-zA-Z0-9_-]*)~";
        if ($this->playerExist($username)) {
            throw new Exception("Le nom d'utilisateur est déjà utilisé");
        }
        else if (
            strlen($username) >= 3 &&
            strlen($username) <= 20 &&
            gettype($username) == "string" &&
            preg_match($pattern, $username)
        ) {
            $this->username = $username;
        }
        else {
            throw new Exception("Le nom d'utilisateur est incorrecte");
        }  
    }

    public function setPassword($password)
    {
        if (
            strlen($password) >= 3 &&
            strlen($password) <= 40
        ) {
            $this->password = $this->getHashPassword($password);
        }
        else {
            throw new Exception("Le mot-de-passe est incorrecte");
        }  
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
        catch (Throwable $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    public function createSession()
    {
        if ($this->getUsername() != null && $this->getPassword() != null && $this->getBdd() != null)
        {
            try {
                $bdd = $this->bdd;
                $requete = $bdd->prepare('INSERT INTO `player`(`username`, `pass`, `lastActivity`, `isConnected`, `isAdmin`) VALUES (:username, :pass, :lastActivity, :isConnected, :isAdmin)');
                $requete->execute(array(
                    'username' => $this->getUsername(),
                    'pass' => $this->getPassword(),
                    'lastActivity' => date("Y-m-d H:i:s"),
                    'isConnected' => 0,
                    'isAdmin' => 0
                )) or die(print_r($requete->errorInfo()));
            }
            catch (Throwable $e)
            {
                throw new Exception($e->getMessage());
            }
        }
        else {
            throw new Exception("Connexion impossible.");
        }
    }

}