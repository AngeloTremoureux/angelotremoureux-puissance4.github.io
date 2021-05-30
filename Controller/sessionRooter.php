<?php
require_once('Controller/pdo.php');
if ($isConnected)
{
    try {
        $requete = $dbh->prepare('UPDATE player SET lastActivity = :lastActivity WHERE playerId = :playerId');
        $requete->execute(array(
            'playerId' => $_SESSION['playerId'],
            'lastActivity' => date("Y-m-d H:i:s")
        ));
    }
    catch (Exception $e)
    {
        throw new Exception($e->getMessage());
    }
}


class Session {

    private $username;
    private $createdAccount;
    private $lastLogin;
    private $isConnected;
    private $isAdmin;

    public function destroy()
    {
        session_destroy();
    }

    public function setUsername($username) : void
    {
        $this->username = $username;
    }
    public function setCreatedAccount($createdAccount) : void
    {
        $this->createdAccount = $createdAccount;
    }
    public function setLastLogin($lastLogin) : void
    {
        $this->lastLogin = $lastLogin;
    }
    public function setConnected($isConnected) : void
    {
        $this->isConnected = $isConnected;
    }
    public function setAdmin($isAdmin) : void
    {
        $this->isAdmin = $isAdmin;
    }


    public function getCreatedAccount()
    {
        return $this->createdAccount;
    }

    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    public function getIsConnected()
    {
        return $this->isConnected;
    }

    public function getIsAdmin()
    {
        return $this->isAdmin;
    }
}