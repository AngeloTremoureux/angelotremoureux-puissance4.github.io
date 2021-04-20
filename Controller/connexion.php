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
        $pattern = "~([a-zA-Z_-]*)~";
        if (
            strlen($username) >= 3 &&
            strlen($username) <= 20 &&
            gettype($username) == "string" &&
            preg_match($pattern, $username)
        ) {
            $this->username = $username;
            print("oook1");
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
            print("oook2");
        }
        else {
            throw new Exception("Le mot-de-passe est incorrecte");
        }  
    }

    public function createSession()
    {
        if ($this->getUsername() != null && $this->getPassword() != null && $this->getBdd() != null)
        {
            try {
                $bdd = $this->bdd;
                $requete = $bdd->prepare('INSERT INTO player (username, password, lastLogin, isConnected, isAdmin) VALUES (:username, :password, :lastLogin, :isConnected, :isAdmin)');
                $requete->execute(array(
                    'username' => $this->getUsername(),
                    'password' => $this->getPassword(),
                    'lastLogin' => null,
                    'isConnected' => false,
                    'isAdmin' => false
                ));
                print("oook3");
            }
            catch (Exception $e)
            {
                throw new Exception($e->getMessage());
            }
        }
        else {
            throw new Exception("Connexion impossible.");
        }
    }

}