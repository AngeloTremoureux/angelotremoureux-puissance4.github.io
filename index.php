<?php

$rowX = filter_input(INPUT_GET, 'x', FILTER_SANITIZE_NUMBER_INT);
$rowY = filter_input(INPUT_GET, 'y', FILTER_SANITIZE_NUMBER_INT);
$register = filter_input(INPUT_GET, 'register', FILTER_SANITIZE_STRING);

if (!empty($rowX) && is_int($rowY) && !empty($rowY) && is_int($rowX))
{
    require('Controller/game.php');
    $game = new game('View/v_game.php', $rowX, $rowY);

    require($game->getTemplate());
}
else {
    require('View/v_login.php');
}