<?php
if ($isConnected)
{
    require('error.php');
}
else
{
    if (isset($_POST['username'], $_POST['password'])) {
        try {
            require_once('Controller/pdo.php');
            require_once('SessionRegister.php');
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $session = new SessionRegister();
            
            $session->setBdd($dbh);
    
            $session->setUsername($username);
            $session->setPassword($password);
            
            $session->createSession();
            $register = false;
            header("Location:./login&usr=" . htmlspecialchars($username) . "&prev_action=createdNewAccount");
        
        }
        catch (Exception $ex)
        {
            $exception = $ex->getMessage();
        }
    }
    $path = "/account/register";
    $title = "S'enregistrer - Puissance4";
    require('View/v_login_header.php');
    require('View/v_nav.php');
    require('View/v_register.php');
}