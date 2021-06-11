<?php

session_start();

date_default_timezone_set('Europe/Paris');
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Controller/pdo.php');

use App\SessionRooter as SessionRooter;

if (isset($_SESSION['username'], $_SESSION['playerId']) && empty($logout)) {
    $isConnected = true;
    try {
        $_SESSION['sess'] = new SessionRooter();
        $_SESSION['sess']->setActivity($dbh, $_SESSION['playerId']);
    } catch (Throwable $e) {
        //throw new Exception($e->getMessage());
    }
} else {
    $isConnected = false;
};

$target = filter_input(INPUT_GET, 'target', FILTER_SANITIZE_STRING);

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/View');
$twig = new \Twig\Environment($loader, [
    //'cache' => __DIR__ . '/cache',
]);

$twig->addGlobal('session', $_SESSION);
$twig->addGlobal('isConnected', $isConnected);
$twig->addGlobal('currentPage', $target);

switch ($target) {
    case 'login':
        require('Controller/pages/login.php');
        break;
    case 'logout':
        require('Controller/pages/logout.php');
        break;
    case 'register':
        require('Controller/pages/register.php');
        break;
    case 'members':
        require('Controller/pages/members.php');
        break;
    case 'me':
        require('Controller/pages/profile.php');
        break;
    case 'play':
        require('Controller/pages/play.php');
        break;
    default:
        header('Location: /play');
        break;
}
