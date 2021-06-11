<?php

require_once(__DIR__ . '/../pdo.php');
require_once(__DIR__ . '/../../vendor/autoload.php');

use App\SessionLogin as Login;

$prev_action = filter_input(INPUT_GET, 'prev_action', FILTER_SANITIZE_STRING);
$username    = filter_input(INPUT_GET, 'usr', FILTER_SANITIZE_STRING);
$exception   = null;

if ($isConnected) {
    require_once(__DIR__ . '/../error.php');
} else {
    try {
        if (isset($_POST['username'], $_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $session = new Login();
            
            $session->setBdd($dbh);

            $session->setUsername($username);
            $session->setPassword($password);
            
            $session->loginToAccount();
            $register = false;

            header("Location:/play?prev_action=logged&usr=" . htmlspecialchars($username));
        }
    } catch (Exception $ex) {
        $username  = htmlspecialchars($username);
        $exception = $ex->getMessage();
    }

    isset($prev_action) && $prev_action == 'createdNewAccount' ?
    $accountJustCreatedBefore = true : $accountJustCreatedBefore = false;


    $twigRenderTemplate = $twig->load('template.html');

    $data = [
        'head' => [
            'title' => 'Connexion',
            'scripts' => [
                'login.js',
                'bootstrap/bootstrap.js'
            ],
            'links' => ['login.css'],
        ],
        'content' => [
            'uriTemplate' => 'login.html',
            'accountJustCreatedBefore' => $accountJustCreatedBefore,
            'exception' => $exception,
            'username' => $username
        ]
    ];

    // Affichage du rendu

    echo $twigRenderTemplate->render([
        'data' => $data
    ]);
}
