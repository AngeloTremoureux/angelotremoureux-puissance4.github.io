<?php

require_once(__DIR__ . '/../pdo.php');
require_once(__DIR__ . '/../../vendor/autoload.php');

use App\SessionRegister as Register;

if ($isConnected) {
    require_once(__DIR__ . '/../error.php');
} else {
    if (isset($_POST['username'], $_POST['password'])) {
        try {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $session = new Register();
            
            $session->setBdd($dbh);
    
            $session->setUsername($username);
            $session->setPassword($password);
            
            $session->createSession();
            $register = false;
            header("Location:./login&usr=" . htmlspecialchars($username) . "&prev_action=createdNewAccount");
        } catch (Exception $ex) {
            $exception = $ex->getMessage();
        }
    }
    $path = "/account/register";
    $title = "S'enregistrer - Puissance4";
    require(__DIR__ . '/../../View/v_login_header.php');
    require(__DIR__ . '/../../View/v_nav.php');
    require(__DIR__ . '/../../View/v_register.php');
}
