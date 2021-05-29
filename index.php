<?php

session_start();

$rowX = filter_input(INPUT_GET, 'x', FILTER_SANITIZE_NUMBER_INT);
$rowY = filter_input(INPUT_GET, 'y', FILTER_SANITIZE_NUMBER_INT);
$logout = filter_input(INPUT_GET, 'logout', FILTER_SANITIZE_STRING);

if (isset($_SESSION['username'], $_SESSION['playerId']) && empty($logout))
{
    $isConnected = true;
    
}
else {
    $isConnected = false;
}

$target = filter_input(INPUT_GET, 'target', FILTER_SANITIZE_STRING);
switch ($target)
{
    case 'login':
        require('Controller/login.php');
        break;
    case 'logout':
        require('Controller/logout.php');
        break;
    case 'register':
        require('Controller/register.php');
        break;
    case 'members':
        require('Controller/members.php');
        break;
    case 'me':
        require('Controller/profile.php');
        break;
    case 'play':
        require('Controller/play.php');
        break;
    default:
        header('Location: /play');
        break;
}