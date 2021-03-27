<?php

$rowX = filter_input(INPUT_GET, 'x', FILTER_SANITIZE_NUMBER_INT);
$rowY = filter_input(INPUT_GET, 'y', FILTER_SANITIZE_NUMBER_INT);
if (empty($rowX) || !is_int($rowY)) {
    $rowX = 7;
}
if (empty($rowY) || !is_int($rowY)) {
    $rowY = 5;
}

require('Controller/game.php');
$game = new game('View/v_game.php', $rowX, $rowY);

require($game->getTemplate());

