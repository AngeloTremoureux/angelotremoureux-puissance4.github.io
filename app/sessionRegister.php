<?php

namespace App;

use Exception as Exception;
use Throwable as Throwable;

class SessionRegister
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

    private function getHashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function setUsername($username)
    {
        $patternRegexUsername = "~([a-zA-Z0-9_-]*)~";
        if ($this->playerExist($username)) {
            throw new Exception("Le nom d'utilisateur est déjà utilisé");
        } elseif (strlen($username) < 3 || strlen($username) > 20) {
            throw new Exception("Le nom d'utilisateur doit avoir entre 3 et 20 caractères.");
        } elseif (gettype($username) != 'string') {
            throw new Exception("Le format du nom d'utilisateur n'est pas valide");
        } elseif (!preg_match($patternRegexUsername, $username)) {
            throw new Exception("Les caractères spéciaux autorisés sont : - et _");
        } else {
            $this->username = $username;
        }
    }

    public function setPassword($password)
    {
        if (strlen($password) >= 3 && strlen($password) <= 40) {
            $this->password = $this->getHashPassword($password);
        } else {
            throw new Exception("Le mot-de-passe est incorrecte");
        }
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

    public function createSession()
    {
        if ($this->getUsername() != null && $this->getPassword() != null && $this->getBdd() != null) {
            try {
                $bdd = $this->bdd;
                $requete = $bdd->prepare('
                INSERT INTO `player`(`username`, `pass`, `lastActivity`, `isAdmin`, `icon`, `pays`, `email`)
                VALUES (:username, :pass, :lastActivity, :isAdmin, :icon, :pays, :email)');
                $requete->execute(array(
                    'username' => $this->getUsername(),
                    'pass' => $this->getPassword(),
                    'lastActivity' => date("Y-m-d H:i:s"),
                    'isAdmin' => 0,
                    'icon' => null,
                    'pays' => 'France',
                    'email' => null
                )) or die();
            } catch (Throwable $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            throw new Exception("Connexion impossible.");
        }
    }
}
