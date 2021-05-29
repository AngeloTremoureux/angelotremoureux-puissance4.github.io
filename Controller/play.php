<?php
if ($isConnected)
{
    require('game.php');
    if (!isset($rowX) || !is_int($rowX))
    {
        $rowX = 7;
    }
    if (!isset($rowY) || !is_int($rowY))
    {
        $rowY = 5;
    }
    $title = 'Puissance 4 - Jouer';
    $game = new game('View/v_game.php', $rowX, $rowY);
    require('View/v_game_header.php');
    require($game->getTemplate());
}
else
{
    header("Location: /account/login?prev_action=redirect&url--play");
}
