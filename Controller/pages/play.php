<?php

use App\Game as Game;

if ($isConnected) {
    $nbCase['x'] = filter_input(INPUT_GET, 'x', FILTER_SANITIZE_NUMBER_INT);
    $nbCase['y'] = filter_input(INPUT_GET, 'y', FILTER_SANITIZE_NUMBER_INT);

    if (!isset($nbCase['x']) || !is_int($nbCase['x'])) {
        $nbCase['x'] = 7;
    }
    if (!isset($nbCase['y']) || !is_int($nbCase['y'])) {
        $nbCase['y'] = 5;
    }

    $game = new game('View/v_game.php', $nbCase['x'], $nbCase['y']);

    $twigRenderTemplate = $twig->load('template.html');

    // Paramètres des variables

    $data = [
        'head' => [
            'title' => 'Jouer',
            'scripts' => [
                'jQuery' => [
                    'src' => 'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
                    'out' => true
                ],
                'piece_add.js',
                'game_manager.js',
                'robot_manager.js',
                'match_manager.js',
                'isWinner_manager.js',
                'isWinner_call.js',
                'main.js',
                'panel.js',
            ],
            'links' => ['ext/jquery-ui.css'],
        ],
        'content' => [
            'uriTemplate' => 'play.html',
            'nbCase' => $nbCase
        ]
    ];

    // Affichage du rendu

    echo $twigRenderTemplate->render([
        'data' => $data
    ]);
    
    ?>
    <script>
        game.init(<?= $game->getNbCase('x'); ?>, <?= $game->getNbCase('y') ?>);
        jeton.init();
        jQuery(document).ready(function ($) {
            game.createBackground();
        });
    </script>
    <?php
} else {
    header("Location: /account/login?prev_action=redirect&url--play");
}
