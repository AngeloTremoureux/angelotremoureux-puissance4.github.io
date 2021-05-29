<?php

$prev_action = filter_input(INPUT_GET, 'prev_action', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_GET, 'usr', FILTER_SANITIZE_STRING);

if ($isConnected)
{
    require('error.php');
}
else
{
    if (isset($_POST['username'], $_POST['password'])) {
        try { 
            require_once('Controller/pdo.php');
            require_once('Controller/SessionLogin.php');
            $username = $_POST['username'];
            $password = $_POST['password'];

            $session = new SessionLogin();
            
            $session->setBdd($dbh);

            $session->setUsername($username);
            $session->setPassword($password);
            
            $session->loginToAccount();
            $register = false;
            header("Location:/play?prev_action=logged&usr=" . htmlspecialchars($username));
    
        }
        catch (Exception $ex)
        {
            $username=htmlspecialchars($username);
            $exception = $ex->getMessage();
        }
    }
    if (isset($prev_action) && $prev_action == 'createdNewAccount') {
        $accountJustCreatedBefore = true;
    } else {
        $accountJustCreatedBefore = false;
    }
    $path = "/account/login";
    $title = "Connexion - Puissance4";
    require('View/v_login_header.php');
    require('View/v_nav.php');
    require('View/v_login.php');
}